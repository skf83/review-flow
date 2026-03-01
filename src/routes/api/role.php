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
         * ...ALL ROLES
         */
        $this->get('/roles', [api\controllers\RoleController::class, 'getAllRoles'])->setName('api.get.roles');

        /**
         * ...ROLE BY ID
         */
        $this->get('/role/{id}', [api\controllers\RoleController::class, 'getRoleByID'])->setName('api.get.role.id');

    });

    /**
     * POST (create)
     */
    $app->group('/new', function () use($app) {

        /**
         * ...CREATE ROLE
         */
        //$this->post('/role', [api\controllers\RoleController::class, 'createRole'])->setName('api.post.role');

    });

    /**
     * PUT (update)
     */
    $app->group('/edit', function () use($app) {

        /**
         * ...EDIT ROLE
         */
        //$this->put('/role/{id}', [api\controllers\RoleController::class, 'updateRole'])->setName('api.put.role');

    });

    /**
     * DELETE
     */
    $app->group('/delete', function () use($app) {

        /**
         * ...DELETE ROLE
         */
        //$this->delete('/role/{id}', [api\controllers\RoleController::class, 'deleteRole'])->setName('api.delete.role');

    });

})->add(new JwtAuthenticateMiddleware($jwtAuth));