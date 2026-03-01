<?php

namespace app\controllers;

use app\models\data\User;

use Element\Sentinel\Sentinel;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};

class HomeController extends BaseController {

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getHome(Response $response): Response {

        $users  = User::paginate(3);

        /**
         * Obs Følgende metoder virker nu 🤓
         *
         * - dump(Sentinel::authenticate($email, $password, $remember));
         * - dump(Sentinel::activationExists($id));
         * - dump(Sentinel::activateUser($id));
         * - dump(Sentinel::resendActivation($id));
         * - dump(Sentinel::check());
         * - dump(Sentinel::guest());                                                                                   Note! alias for check()
         * - dump(Sentinel::register(array $attributes, int $activate));
         * - dump(Sentinel::validateCredentials(string $email, string $password, object $authenticatedUser));
         * - dump(Sentinel::logout());
         *
         * - dump(Sentinel::user()->register(array $attributes, int $activate));
         * - dump(Sentinel::user()->check());
         * - dump(Sentinel::user()->findById(int $id));                                                                 f.ex.: 1
         * - dump(Sentinel::user()->findByUuid(string $uuid));                                                          f.ex.: 'f47ac10b-58cc-4372-a567-0e02b2c3d479'
         * - dump(Sentinel::user()->findByEmail(string $email));                                                        f.ex.: 'skf@koerkort.nu'
         *
         * - dump(Sentinel::auth()->authenticate($email, $password, $remember));
         * - dump(Sentinel::auth()->check());
         * - dump(Sentinel::auth()->validateCredentials(string $email, string $password, object $authenticatedUser));
         * - dump(Sentinel::auth()->logout());
         *
         * - dump(Sentinel::log()->alert($message, array $context));                                                    Note! type can be: alert, critical, error, warning, notice, info, debug etc.
         *
         * - dump(Sentinel::roles()->userHasRole(int $id, string $slug));
         */

//        dump(Sentinel::activation());

        return $this->view->render($response, '/home/index.twig', [

            'pageHead'      => "front",
            'pageTitle'     => "Element3",

            'setup'         => $this->appSetup,
            'locales'       => $this->locales,

            'users'         => $users
        ]);
    }
}