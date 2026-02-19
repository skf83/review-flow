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
$app->group('/user', function () use($app) {

    /**
     * INNER Group : USER -> PROFILE
     */
    $app->group('/profile', function () use($app) {

        /**
         * rendering view : USER -> PROFILE -> ME
         */
        $app->get('/me', ['app\controllers\UserController', 'getUserProfile'])->setName('user.profile');

        /**
         * method : USER -> UPDATE -> BASIC INFO
         */
        $app->post('/{id}/update/basic-info', ['app\controllers\UserController', 'updateBasicInfo'])->setName('user.update.basic-info');

        /**
         * method : USER -> UPDATE -> ADDRESS
         */
        $app->post('/{id}/update/address', ['app\controllers\UserController', 'updateAddress'])->setName('user.update.address');

        /**
         * method : USER -> UPDATE -> PASSWORD
         */
        $app->post('/{id}/update/password', ['app\controllers\UserController', 'updatePassword'])->setName('user.update.password');

        /**
         * method : USER -> TOGGLE -> SOCIAL SERVICE BEING SHOWN ONLINE
         */
        $app->post('/{id}/toggle/show-social/{service}', ['app\controllers\UserController', 'toggleSocialServiceBeingShown'])->setName('user.toggle.show-social-service');

        /**
         * method : USER -> DELETE -> SOCIAL SERVICE
         */
        $app->post('/{id}/delete/social-service/{service}', ['app\controllers\UserController', 'deleteSocialService'])->setName('user.delete.social-service');

    });

})
    ->add(new AuthMiddleware($router))
    ->add(new CsrfViewMiddleware($view, $guard))
    ->add($guard)
;