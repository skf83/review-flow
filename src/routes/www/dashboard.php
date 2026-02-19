<?php global $app;

use app\middleware\security\{
    back\AuthMiddleware,
    CsrfViewMiddleware
};

use Psr\Container\{
    ContainerExceptionInterface,
    NotFoundExceptionInterface
};

use Slim\{
    Csrf\Guard,
    Router,
    Views\Twig
};

/**
 * Pulling container items
 */
try {

    $guard  = $app->getContainer()->get(Guard::class);
    $router = $app->getContainer()->get(Router::class);
    $view   = $app->getContainer()->get(Twig::class);

} catch (NotFoundExceptionInterface|ContainerExceptionInterface $error) {

    // ...do something

}

/**
 * OUTER Group that applies CSRF to routes
 *
 * @var $app
 *
 */
$app->group('/dashboard', function () use($app) {

    /**
     * rendering view : DASHBOARD -> OVERVIEW
     */
    $app->get('/overview', ['app\controllers\DashboardController', 'getDashboardOverview'])->setName('dashboard.overview');

})
    ->add(new AuthMiddleware($router))
    ->add(new CsrfViewMiddleware($view, $guard))
    ->add($guard)
;

/**
 * Group that DOESN'T require the user to be signed in nor a guest!
 */
$app->group('', function () {

    /**
     * action : CRON JOB -> BACKUP -> DATABASE
     */
    $this->get('/backup/database', ['app\controllers\DashboardController', 'backupDatabase'])->setName('backup.database');

});