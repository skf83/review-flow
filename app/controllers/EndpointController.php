<?php

namespace app\controllers;

use app\models\data\User;

use app\models\monitor\Endpoint;
use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};

class EndpointController extends BaseController {

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function getEndpointOverview(Request $request, Response $response): Response {

        //$endpoints  = Endpoint::paginate(1);
        $endpoints  = Endpoint::with([])->get();

        return $this->view->render($response, '/dashboard/endpoint-overview.twig', [

            'pageTitle'     => "Endpoints",

            'setup'     => $this->appSetup,
            'locales'   => $this->locales,

            'endpoints' => $endpoints
        ]);
    }
}