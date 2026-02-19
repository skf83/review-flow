<?php

namespace app\controllers;

use Psr\Http\Message\{
    ResponseInterface as Response
};

class TranslationController extends BaseController {

    /**
     * @param Response $response
     * @param $lang
     *
     * @return mixed
     */
    public function switch(Response $response, $lang) {

        if (isset($lang)) {

            $_SESSION['lang'] = $lang;
        }

        return $response->withStatus(302)->withHeader('Location', '/');
    }
}
