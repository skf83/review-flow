<?php

namespace app\controllers;

use app\models\data\User;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};

class HomeController extends BaseController {

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function getHome(Request $request, Response $response): Response {

        $users  = User::paginate(3);

        return $this->view->render($response, '/home/index.twig', [

            'pageTitle' => "Element3",

            'setup'     => $this->appSetup,
            'locales'   => $this->locales,

            'users'     => $users
        ]);
    }
}