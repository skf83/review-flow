<?php

namespace api\controllers;

use Element\JwtAuth\Auth;

use Noodlehaus\Config;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class AuthController extends BaseController {

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return mixed
     */
    public function fetchToken(Request $request, Response $response) {

        $email      = $request->getParam('email');
        $password   = $request->getParam('password');

        $token      = $this->jwt->attempt($email, $password);

        if (!$token) {

            $data['error'] = 'Fetching Token failed';
            return $response->withJson($data, 401);
        }

        return $response->withJson([

            'min_to_expire' => $this->config->get('auth.jwt.expiry'),
            'token_type'    => "Bearer",
            'access_token'  => $token,
        ]);
    }
}
