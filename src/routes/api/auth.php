<?php global $app;

/**
 * OUTER Group that DOESN'T apply CSRF to routes
 *
 * @var $app
 *
 */
$app->group('/api', function () use($app) {

    /**
     * POST (create)
     */
    $app->group('/auth', function () use($app) {

        /**
         * retrieving : AUTH -> FETCH JWT TOKEN
         */
        $this->post('/fetch-token', [api\controllers\AuthController::class, 'fetchToken'])->setName('api.fetch.token');

    });

});
