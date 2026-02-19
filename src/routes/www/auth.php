<?php global $app;

use app\middleware\security\{
    back\AuthMiddleware,
    back\GuestMiddleware,
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
 * @var $router
 */
$app->group('/auth', function () use($app, $router) {

    /**
     * INNER Group that DOESN'T allow the user to be signed in!...
     */
    $app->group('', function () use($app) {

        /**
         * rendering view : AUTH -> SIGN-IN
         */
        $app->get('/sign-in', ['app\controllers\AuthController', 'getSignIn'])->setName('auth.sign-in');
        $app->post('/sign-in', ['app\controllers\AuthController', 'postSignIn']);

        /**
         * rendering view : AUTH -> RESET PASSWORD
         */
        $app->get('/reset-password', ['app\controllers\AuthController', 'getPasswordReset'])->setName('auth.password-reset');
        $app->post('/reset-password', ['app\controllers\AuthController', 'postPasswordReset']);

        /**
         * rendering view : AUTH -> SIGN-UP
         */
        $app->get('/sign-up', ['app\controllers\AuthController', 'getSignUp'])->setName('auth.sign-up');
        $app->post('/sign-up', ['app\controllers\AuthController', 'postSignUp']);

        /**
         * rendering view : AUTH -> ACTIVATE
         */
        $app->get('/activate', ['app\controllers\AuthController', 'getActivation'])->setName('auth.activate-user');
        $app->post('/activate', ['app\controllers\AuthController', 'postActivation']);

    })->add(new GuestMiddleware($router));

    /**
     * INNER Group that DOESN'T allow the user to be signed in!...
     */
    $app->group('/sso', function () use($app) {

        /* SSO auth -> SIGN-IN -> WITH -> {SERVICE} */
        $this->get('/sign-in/with/{service}', ['app\controllers\AuthController', 'getSocialSignIn'])->setName('auth.sso.login-with-service');
        $this->get('/sign-in/with/{service}/status', ['app\controllers\AuthController', 'getSocialSignInStatus']);

        /* SSO auth -> LINK-ACCOUNTS */
        $this->get('/link-accounts/{uid}', ['app\controllers\AuthController', 'getLinkAccounts'])->setName('auth.sso.link-accounts');
        $this->post('/link-accounts/{uid}', ['app\controllers\AuthController', 'postLinkAccounts']);

    })->add(new GuestMiddleware($router));

    /**
     * INNER Group that DOES require the user to be signed in!...
     */
    $app->group('', function () use($app) {

        /* auth -> LOCK SYSTEM */ // TODO
        $app->get('/lock-system', [app\controllers\AuthController::class, 'getSystemLock'])->setName('auth.lock-system');
        $app->post('/lock-system', [app\controllers\AuthController::class, 'postSystemLock']);

        /**
         * method for : AUTH -> SIGN-OUT
         */
        $app->get('/sign-out', ['app\controllers\AuthController', 'postSignOut'])->setName('auth.sign-out');

    })->add(new AuthMiddleware($router));

})
    ->add(new CsrfViewMiddleware($view, $guard))
    ->add($guard)
;