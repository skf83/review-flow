<?php

namespace api\controllers;

use app\models\auth\{
    Role
};

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class RoleController extends BaseController {

    /**
     * @var array Relational properties
     */
    private array $roleRelations = [

        'meta.locale',
        'permissions.items'
    ];

    /**
     * Get ALL ROLES
     *
     * @param Response $response
     *
     * @return Response
     */
    public function getAllRoles(Response $response): Response {

        $roles = Role::with($this->roleRelations)->get();

        if ($roles) {

            return $response->withJson($roles, 200);

        }

        $data['error'] = 'No users were found';

        return $response->withJson($data, 404);
    }

    /**
     * GET ROLE BY ID
     *
     * @param Response $response
     * @param $id
     *
     * @return Response
     */
    public function getRoleByID(Response $response, $id) : Response {

        $role = Role::with($this->roleRelations)->where('id', '=', $id)->first();

        if ($role) {

            try {

                return $response->withJson($role, 200);

            } catch (\Exception $error) {

                echo $error;
            }

        } else {

            $data['error'] = "Couldn't find a role with that ID";
            return $response->withJson($data, 404);

        }

        $data['error'] = 'Something went wrong!?';
        return $response->withJson($data, 500);
    }

}
