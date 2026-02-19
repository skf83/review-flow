<?php global $app;

use app\handlers\auth\jwt\JwtAuth;

use app\middleware\security\api\{JwtAuthenticateMiddleware};

/**
 * Pulling container items
 */
$jwtAuth = $app->getContainer()->get(JwtAuth::class);

/**
 * OUTER Group that applies JWT to routes
 *
 * @var $app
 * @var $container
 *
 */
$app->group('/api', function () use($app) {

    /**
     * GET
     */
    $app->group('/get', function () use($app) {

        /**
         * ...USER from JWT token
         */
        $this->get('/user/me', [api\controllers\UserController::class, 'getUserFromAuthToken'])->setName('api.get.user.from-auth-token');

        /**
         * ...ALL USERS
         */
        $this->get('/users', [api\controllers\UserController::class, 'getAllUsers'])->setName('api.get.users');

        /**
         * ...USER BY ID
         */
        $this->get('/user/{id}', [api\controllers\UserController::class, 'getUserByID'])->setName('api.get.user.id');

    });

    /**
     * POST (create)
     */
    $app->group('/new', function () use($app) {

        /**
         * ...CREATE USER
         */
        //$this->post('/user', [api\controllers\UserController::class, 'createUser'])->setName('api.post.user');

    });

    /**
     * PUT (update)
     */
    $app->group('/edit', function () use($app) {

        /**
         * ...EDIT USER
         */
        //$this->put('/user/{id}', [api\controllers\UserController::class, 'updateUser'])->setName('api.put.user');

    });

    /**
     * DELETE
     */
    $app->group('/delete', function () use($app) {

        /**
         * ...DELETE USER
         */
        //$this->delete('/user/{id}', [api\controllers\UserController::class, 'deleteUser'])->setName('api.delete.user');

    });

})->add(new JwtAuthenticateMiddleware($jwtAuth));