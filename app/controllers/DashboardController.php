<?php

namespace app\controllers;

use app\handlers\app\AppDetails;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Psr\Container\{
    ContainerExceptionInterface,
    NotFoundExceptionInterface
};

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};

class DashboardController extends BaseController {

    /**
     * @param Response $response
     *
     * @return Response
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getWhatsNew(Response $response) : Response {

        $appDetails = $this->container->get(AppDetails::class)->getVersion();

        return $this->view->render($response, '/dashboard/whats-new.twig', [

            'pageTitle'     => "What's New? 👀📣",

            'setup'         => $this->appSetup,
            'locales'       => $this->locales,

            'br_title'      => "What's new?",
            'br_subtitle'   => $appDetails
        ]);
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getDashboardOverview(Response $response): Response {

        return $this->view->render($response, '/dashboard/overview.twig', [

            'pageTitle'     => "Dashboard",

            'setup'         => $this->appSetup,
            'locales'       => $this->locales,

            'br_title'      => "Dashboard",
            'br_subtitle'   => "Overview",
        ]);
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function backupDatabase(Response $response) : Response {

        $sqlfile = exec('mysqldump 
        
            --host='        . $this->config->get('db.mysql.host').' 
            --port='        . $this->config->get('db.mysql.port').' 
            --user='        . $this->config->get('db.mysql.user').' 
            --password='    . $this->config->get('db.mysql.password').'
            
            '.$this->config->get('db.mysql.database').' > ./storage/database/data_'.date("d-m-Y_H:i:s").'.sql'
        );

        return $response->withStatus(302)->withHeader('Location', $_SESSION['currentRoute']);
    }
}