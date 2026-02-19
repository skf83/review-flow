<?php

/**
 * OUTER Group that DOESN'T apply CSRF to routes
 *
 * @var $app
 *
 */
$app->group('/api', function () use($app) {

    /**
     * SWAGGER UI
     */
    $app->group('/v1', function () use($app) {

        /**
         * rendering view : API -> SWAGGER-UI
         */
        $this->get('/welcome', [app\controllers\SwaggerController::class, 'getApiVersion1Ui'])->setName('api.v1.get.swagger-ui');

    });

});
