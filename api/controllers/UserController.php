<?php

namespace api\controllers;

use app\models\data\{
    User,
    UserTelephone
};

//use app\models\mail\Welcome;

use Respect\Validation\Validator as v;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class UserController extends BaseController {

    /**
     * @var array Relational properties
     */
    private array $userRelations = [

        'sso',
        'addresses',
        'telephone',
        'roles'
    ];

    /**
     * GET USER FROM AUTH TOKEN (signin)
     *
     * @param Request $request
     * @param Response $response
     *
     * @return object
     */
    public function getUserFromAuthToken(Request $request, Response $response) : object {

        $authMethod = $request->getParam('authMethod');

        if ($authMethod === "2FA") {

            /**
             * ...Functionality pending...
             * (it doesn't do anything yet!)
             */
            $data['success'] = '2FA requested';
            return $response->withJson($data, 200);

        } else {

            try {

                $token = $request->getHeaderLine("Authorization");

                $authenticated = $this->jwt->authenticate($token);

                $user = $authenticated->user();

                $user = User::with($this->userRelations)->where('id', '=', $user->id)->first();

                return $response->withJson($user, 200);

            } catch (\Exception $exception) {

                dump($exception);
                die;

            }
        }
    }

    /**
     * Get ALL users
     *
     * @param Response $response
     *
     * @return Response
     */
    public function getAllUsers(Response $response) : Response {

        $users = User::with($this->userRelations)->get();

        if ($users) {

            return $response->withJson($users, 200);

        }

        $data['error'] = 'No users were found';

        return $response->withJson($data, 404);
    }

    /**
     * GET USER BY ID
     *
     * @param Response $response
     * @param User $user
     * @param $id
     *
     * @return Response
     */
    public function getUserByID(Response $response, User $user, $id) : Response {

        $user = $user::with($this->userRelations)->where('id', '=', $id)->first();

        if ($user) {

            try {

                return $response->withJson($user, 200);

            } catch (\Exception $error) {

                echo $error;
            }

        } else {

            $data['error'] = "Couldn't find a user with that ID";
            return $response->withJson($data, 404);

        }

        $data['error'] = 'Something went wrong!?';
        return $response->withJson($data, 500);
    }

    /**
     * [O] EDIT USER
     *
     * @param Request $request
     * @param Response $response
     * @param $id
     * @param User $user
     *
     * @return mixed
     */
    public function updateUser(Request $request, Response $response, $id, User $user) {

        $user = $user::with($this->userRelations)->where('id', '=', $id)->first();

        if ($user) {

            try {

                $user->update([

                    'uid'           => $request->getParam('uid'),
                    'email'         => $request->getParam('email'),
                    'password'      => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
                    'img_cover'     => $request->getParam('img_cover'),
                    'img_avatar'    => $request->getParam('img_avatar'),
                    'role'          => $request->getParam('role'),
                    'initials'      => strtolower($request->getParam('initials')),
                    'first_name'    => ucwords($request->getParam('first_name')),
                    'last_name'     => ucwords($request->getParam('last_name')),
                    'status'        => $request->getParam('status'),
                    'token'         => $request->getParam('token'),
                    'isActivated'   => $request->getParam('isActivated'),
                ]);

                $phone = $user->getRelation('phone');

                if ($phone) {

                    $phone->update([

                        'tel_home'      => $request->getParam('tel_home'),
                        'tel_mobile'    => $request->getParam('tel_mobile'),
                        'tel_work'      => $request->getParam('tel_work'),
                        'accepts_sms'   => $request->getParam('accepts_sms'),
                    ]);
                }

                $data['success'] = 'User updated';
                return $response->withJson($data, 200);

            } catch (\PDOException $e) {

                echo $e;
            }

        } else {

            $data['error'] = "Couldn't find a user with that ID";
            return $response->withJson($data, 404);

        }

        $data['error'] = 'Something went wrong!?';
        return $response->withJson($data, 500);
    }

}
