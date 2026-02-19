<?php

namespace app\controllers;

use Psr\Http\Message\{ResponseInterface as Response};

class SwaggerController extends BaseController {

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getApiVersion1Ui(Response $response) : Response {

        return $this->view->render($response, '/api/v1/swagger-ui.twig', [

            'pageTitle'     => "Element API Version 1",
        ]);
    }
}
