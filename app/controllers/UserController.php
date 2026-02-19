<?php

namespace app\controllers;

use app\models\data\{
    Address,
    User,
    UserAddress,
    UserSocial
};

use Cartalyst\Sentinel\{
    Native\Facades\Sentinel
};

use Respect\Validation\Validator as v;
use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};

class UserController extends BaseController {

    /**
     * @var array Relational properties
     */
    private array $userRelations = [

        'sso',
        'addresses',
        'telephone'
    ];

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getUserProfile(Response $response): Response {

        $userID     = Sentinel::check()->id;

        $user       = User::with($this->userRelations)->where('id','=', $userID)->first();

        $addressIDs = UserAddress::with([])->where('user_id', '=', $userID)->get();

        $homeID     = $addressIDs->where('address_type', '=', 'home')->first()->address_id;
        $home       = Address::with([])->where('id', '=', $homeID)->first();

        $billingID  = $addressIDs->where('address_type', '=', 'billing')->first()->address_id;
        $billing    = Address::with([])->where('id', '=', $billingID)->first();

        return $this->view->render($response, '/dashboard/user-profile.twig', [

            'pageTitle'         => "User Profile",

            'setup'             => $this->appSetup,
            'locales'           => $this->locales,

            'br_title'          => "User",
            'br_subtitle'       => "Profile",

            'user'              => $user,
            'homeAddress'       => $home,
            'billingAddress'    => $billing,
        ]);
    }

    /**
     * @param Response $response
     * @param $id
     *
     * @return Response
     */
    public function updateBasicInfo(Response $response, $id): Response {

        // TODO : validations first

        dump($_POST);
        die;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $id
     *
     * @return Response
     */
    public function updateAddress(Request $request, Response $response, $id): Response {

        $updateAddress = $request->getParam('type');

        // TODO : validations first

        try {

            $address = Address::with([])->firstOrCreate([

                'address1'      => $request->getParam('address1'),
                'address2'      => $request->getParam('address2'),
                'zip'           => $request->getParam('zip'),
                'city'          => $request->getParam('city'),
                'country_code'  => $request->getParam('country_code'),
                'country'       => $request->getParam('country'),

            ], [

                'address1'      => $request->getParam('address1'),
                'address2'      => $request->getParam('address2'),
                'zip'           => $request->getParam('zip'),
                'city'          => $request->getParam('city'),
                'country_code'  => $request->getParam('country_code'),
                'country'       => $request->getParam('country'),
            ]);

        } catch (\Exception $error) {

            dump($error->getMessage());
            die;
        }

        if ($updateAddress === "home") {

            UserAddress::with([])->where('user_id', '=', $id)->where('address_type', '=', 'home')->update([

                'address_id' => $address->id,
            ]);

        } else {

            UserAddress::with([])->where('user_id', '=', $id)->where('address_type', '!=', 'home')->update([

                'address_id' => $address->id,
            ]);

        }

        return $response->withRedirect('/user/profile/me#addresses');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $id
     *
     * @return Response
     */
    public function updatePassword(Request $request, Response $response, $id): Response {

//        // TODO : input validations first
//
//        // lookup the auth user first
//        $user = Sentinel::findById($id);
//
//        // then validate credentials
//        $credentials = [
//
//            'email'    => $user->email,
//            'password' => $request->getParam('current_password'),
//        ];
//
//        $checkCredentials = Sentinel::validateCredentials($user, $credentials);
//
//        if (!$checkCredentials) {
//
//            // flash error-message
//
//            // redirect back if credentials DOESN'T PASS
//            return $response->withRedirect('/user/profile/me#password');
//        }

        $validation = $this->validator->validate($request, [

            'current_password'  => v::noWhitespace()->notEmpty()->matchesPassword($this->auth->user()->password),
            'new_password'      => v::noWhitespace()->notEmpty(),
            'confirm_password'  => v::noWhitespace()->notEmpty()->confirmPassword($request->getParam('new_password'))
        ]);

        /**
         * if updating FAILS, then we redirect back...
         */
        if ($validation->fails()) {

            //$this->flash->addMessage('danger', 'Hmm ?! Prøv igen...');

            return $response->withRedirect('/user/profile/me#password');
        }

        try {

            $this->user->updatePassword($request->getParam('new_password'));

            // flash success-message

        } catch (\Exception $error) {

            dump($error->getMessage());

        }

        return $response->withRedirect('/user/profile/me#password');
    }

    /* -- 2FA -- */

    /**
     * @param Response $response
     * @param $id
     * @param $service
     *
     * @return Response
     */
    public function toggleSocialServiceBeingShown(Response $response, $id, $service): Response {

        $sso = UserSocial::with([])->where('user_id', '=', $id)->where('service', '=', $service)->first();

        try {

            if($sso) {

                $sso->update([

                    'show_on_website' => $sso->show_on_website ? 0 : 1
                ]);

            } else {

                dump("Something went wrong?! For some reason, we couldn't find the service?...");
                die;

            }

        } catch (\Exception $error) {

            dump($error);
            die;

        }

        return $response->withRedirect('/user/profile/me#accounts');
    }

    /**
     * @param Response $response
     * @param $id
     * @param $service
     *
     * @return Response
     */
    public function deleteSocialService(Response $response, $id, $service): Response {

        $sso = UserSocial::with([])->where('user_id', '=', $id)->where('service', '=', $service)->first();

        try {

            if($sso) {

                $sso->delete();

            } else {

                dump("Something went wrong?! For some reason, we couldn't find the service?...");
                die;

            }

        } catch (\Exception $error) {

            dump($error);
            die;

        }

        return $response->withRedirect('/user/profile/me#accounts');
    }

    /* -- NOTIFICATIONS -- */

    /* -- SESSIONS -- */

    /* -- DELETE ACCOUNT -- */
}