<?php global $app;

use app\handlers\auth\jwt\JwtAuth;

use app\middleware\security\api\{JwtAuthenticateMiddleware};

/**
 * Pulling container items
 */
$jwtAuth = $app->getContainer()->get(JwtAuth::class);

/**
 * OUTER Group that DOESN'T apply CSRF to routes
 *
 * @var $app
 *
 */
$app->group('/api', function () use($app) {

    /**
     * GET
     */
    $app->group('/download', function () use($app) {

        /**
         * ...IMAGE BY UUID
         */
        $this->get('/image/{uuid}', [api\controllers\ImageController::class, 'show'])->setName('api.get.image.id');

    });

    /**
     * POST
     */
    $app->group('/upload', function () use($app) {

        /**
         * ...IMAGE
         */
        $this->post('/image', [api\controllers\ImageController::class, 'store'])->setName('api.post.image');

    });

})->add(new JwtAuthenticateMiddleware($jwtAuth));
