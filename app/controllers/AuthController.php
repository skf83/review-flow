<?php

namespace app\controllers;

use app\models\data\{
    User,
    UserAddress,
    UserSocial,
    UserTelephone
};

use Element\Sentinel\Sentinel;

use Element\Sentinel\Services\Exceptions\{
    Auth\UserNotActivatedException,
    Auth\UserNotFoundException,
    Throttle\ThrottlingSuspendedException
};

use Element\Social\Authenticate;
use Element\Unique\Generate;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request
};

use Respect\Validation\Validator as v;

class AuthController extends BaseController {

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getSignIn(Response $response): Response {

        return $this->view->render($response, '/auth/sign-in.twig', [

            'pageHead'      => "back",
            'pageTitle'     => $this->translator->get('auth.usi.page_title'),

            'setup'         => $this->appSetup,
            'locales'       => $this->locales,

        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response|\Slim\Http\Response|void
     */
    public function postSignIn(Request $request, Response $response) {

        $email      = $request->getParam('email');
        $password   = $request->getParam('password');
        $remember   = (bool) $request->getParam('persist');

        try {

            Sentinel::authenticate($email, $password, $remember);

        } catch (UserNotFoundException $error) {

            //... do something

        } catch (UserNotActivatedException $error) {

            /**
             * After generating a new token and saved that on the user,
             * we can then go ahead and send an email to the user...
             */
//            $user        = new User;
////        $user->name  = ucwords( $request->getParam('first_name'));
////        $user->email = $request->getParam('email');
//            $user->name  = "john";
//            $user->email = "stefan@korfitz.com";
//
//            $this->mailer->to($user->email, $user->name)->send(new Welcome($user, $this->translator));

            // redirecting the user if he's not activated
            return $response->withRedirect($this->router->pathFor('auth.activate-user'));

        } catch (ThrottlingSuspendedException $error) {

            dump("Suspect behavior from ip detected! Throttling user access");
            dump("Retry after: " . $error->getRemainingSuspensionSeconds() . " seconds");
            die;

        } catch (\Exception $error) {

            dump($error);
            die;

        }

        return $response->withRedirect($this->router->pathFor('dashboard.overview'));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getPasswordReset(Response $response): Response {

        return $this->view->render($response, '/auth/reset-password.twig', [

            'pageHead'      => "back",
            'pageTitle'     => $this->translator->get('auth.urp.page_title'),

            'setup'         => $this->appSetup,
                'locales'   => $this->locales,
        ]);
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getSignUp(Response $response): Response {

        return $this->view->render($response, '/auth/sign-up.twig', [

            'pageHead'      => "back",
            'pageTitle'     => $this->translator->get('auth.usu.page_title'),

            'setup'         => $this->appSetup,
            'locales'       => $this->locales,
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return void
     */
    public function postSignUp(Request $request, Response $response) {

        // TODO : validations first

        try {

            // Register a new user
            $userWasCreated = Sentinel::register([

                'uuid'              => Generate::uuid4(),
                'first_name'        => $request->getParam('first_name'),
                'last_name'         => $request->getParam('last_name'),
                'email'             => $request->getParam('email'),
                'password'          => $request->getParam('password'),
                'activation_token'  => Generate::otp(),

            ], true, true, true);

            // Proceed only if above was successful...
            if ($userWasCreated) {

                // Update our new user with more parameters
                User::with([])->where('id', '=', $userWasCreated->id)->update([

                    'img_cover'         => '/public/assets/img_placeholder_1920x1080.svg',
                    'img_avatar'        => '/public/assets/img_placeholder_160x160.svg',
                ]);

                // Create the "telephone" relation
                UserTelephone::with([])->create([

                    'user_id'           => $userWasCreated->id,
                    'tel_mobile'        => $request->getParam('mobile_phone'),
                    'tel_mobile_full'   => $request->getParam('mobile_phone_full'),
                ]);

                // Create the 2 "address" relations
                UserAddress::with([])->create([

                    'user_id'       => $userWasCreated->id,
                    'address_type'  => 'home',
                ]);

                UserAddress::with([])->create([

                    'user_id'       => $userWasCreated->id,
                    'address_type'  => 'billing',
                ]);
            }

        } catch (\Exception $error) {

            dump($error);
            die;

        }

        return $response->withRedirect($this->router->pathFor('dashboard.overview'));
    }

    /**
     * @param Response $response
     *
     * @return void
     */
    public function postSignOut(Response $response) {

        try {

            Sentinel::logout();

        } catch (\Exception $error) {

            dump($error);
            die;

        }

        // redirect back to sign-in view
        return $response->withRedirect($this->router->pathFor('auth.sign-in'));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getSystemLock(Response $response): Response {

        return $this->view->render($response, '/auth/lock-system.twig', [

            'pageHead'      => "back",
            'pageTitle'     => $this->translator->get('auth.uls.page_title'),

            'setup'         => $this->appSetup,
            'locales'       => $this->locales,
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return void
     */
    public function postSystemLock(Request $request, Response $response) {

        /**
         * doing some basic validation BEFORE signup is executed
         */
        $validation = $this->validator->validate($request, [

            'password' => v::notEmpty(),
        ]);

        /**
         * if validation fails, then we redirect the user to : /auth/lock-system
         */
        if ($validation->fails()) {

            // TODO : flash a message explaining why it fails...
            return $response->withRedirect($this->router->pathFor('auth.lock-system'));
        }

        $authenticatedUser = Sentinel::check();

        $email      = $authenticatedUser->email;
        $password   = $request->getParam('password');

        $passwordCheck = Sentinel::validateCredentials($email, $password, $authenticatedUser);

        if (!$passwordCheck) {

            // TODO : flash a message explaining why it fails...
            return $response->withRedirect($this->router->pathFor('auth.lock-system'));
        }

        return $response->withRedirect($this->router->pathFor('dashboard.overview'));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function getActivation(Response $response): Response {

        return $this->view->render($response, '/auth/activation.twig', [

            'pageHead'      => "back",
            'pageTitle'     => $this->translator->get('auth.uac.page_title'),

            'setup'         => $this->appSetup,
            'locales'       => $this->locales,
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return mixed
     */
    public function postActivation(Request $request, Response $response) {

        /**
         * doing some basic validation BEFORE signup is executed
         */
        $validation = $this->validator->validate($request, [

            'input_1'    => v::notEmpty(),
            'input_2'    => v::notEmpty(),
            'input_3'    => v::notEmpty(),
            'input_5'    => v::notEmpty(),
            'input_6'    => v::notEmpty(),
            'input_7'    => v::notEmpty(),
        ]);

        /**
         * if validation fails, then we redirect the user to : /auth/lock-system
         */
        if ($validation->fails()) {

            return $response->withRedirect($this->router->pathFor('auth.activate.user-from-token'));
        }

        $token  = $request->getParam('input_1') . $request->getParam('input_2') . $request->getParam('input_3') . "-" . $request->getParam('input_5') . $request->getParam('input_6') . $request->getParam('input_7');

        $user   = User::with([])->where('activation_token', '=', $token)->first();

        /**
         * attempt to ACTIVATE AND THEN signin...
         */
//        $user       = Sentinel::users()->findById($user->id);  TODO
//        $activation = Sentinel::activations()->findOpenByUser($user);  TODO

//        if ($activation) {
//
//            $latestOpenCode = $activation->getCode();
//
//        } else {
//
//            $latestOpenCode = null; // ingen åben activation fundet
//        }

//        try {
//
////            $completed = Sentinel::activation()->complete($user, $latestOpenCode);  TODO
//
//        } catch (\Exception $error) {
//
//            dump($error);
//        }

//        dump($completed);
//        die;

//        $user       = Sentinel::findById($user->id); // returns a Cartalyst\Sentinel\Users\EloquentUser object

        // check if the user has an activation record?!
//        $code       = Activation::with([])->where('user_id', '=', $user->id)->where('completed', '=', null)->orderBy('created_at', 'desc')->first()->code;  TODO

////        if ($code) {
////
////            // complete the activation
////            // Sentinel::getActivationRepository()->complete($user, $code);
////
//////            if (Sentinel::getActivationRepository()->complete('')) {  TODO
//////
//////                // Success
//////                dump("success");
//////                die;
//////
//////            } else {
//////
//////                // Ugyldig eller allerede brugt kode
//////                dump("fail");
//////                die;
//////            }
////
////        } else {
////
////            dump("doesnt have code");
////            die;
////
////            // create a new activation record
//////            Activation::create($user);  TODO
////
////            // and THEN complete the activation
//////            Sentinel::getActivationRepository()->complete($user, $code); TODO
////        }
//
//        dump($code);
//        die;
//
//        /**
//         * if signin FAILS, then we redirect back...
//         */
//        if (!$activate) {
//
//            $this->flash->addMessage('danger', 'Hmm ?! Prøv igen...');
//
//            return $response->withRedirect($this->router->pathFor('auth.activate-user'));
//        }
//
//        $this->flash->addMessage('success', 'velkommen');

        return $response->withRedirect($this->router->pathFor('dashboard.overview'));
    }

    public function resendAuthToken(Request $request, Response $response) {

        dump($request);
        die;
    }

    /**
     * @param $service
     *
     * @return void
     */
    public function getSocialSignIn($service) {

        $config = $this->config->get("sso.{$service}");

        header('Location: ' . Authenticate::with($service, $config)->getAuthorizeUrl());
    }

    /**
     * @param Response $response
     * @param $service
     *
     * @return mixed
     */
    public function getSocialSignInStatus(Response $response, $service) {

        $config = $this->config->get("sso.{$service}");

        if (!isset($_GET['code'])) {

            //$this->flash->addMessage('danger', 'something went wrong?! Please try again...'); TODO
            return $response->withRedirect($this->router->pathFor('auth.sign-in'));
        }

        $authenticated  = Authenticate::with($service, $config)->getUser($_GET['code']);

        $linkUid        = Generate::uniqid();

        $socialAuth     = UserSocial::with([])->firstOrCreate([

            'service'   => $service,
            'email'     => $authenticated->email

        ], [

            'service'   => $service,
            'uid'       => $authenticated->uid,
            'username'  => $authenticated->username,
            'name'      => $authenticated->name,
            'email'     => $authenticated->email,
            'photo'     => $authenticated->photo,
            'link_uid'  => $linkUid,

        ]);

        /**
         * Check if the user has linked his accounts?...
         * If not we then redirect to 'auth.signin.link-accounts'
         */
        if (!$socialAuth->user_id) {

            //$this->flash->addMessage('danger', 'Hmm ?! Prøv igen...'); TODO

            return $response->withRedirect($this->router->pathFor('auth.sso.link-accounts', ['uid' => $socialAuth->link_uid]));

        } else {

//            $user = Sentinel::findById($socialAuth->user_id);

            /**
             * attempt to sign the user in...
             */
//            Sentinel::login($user);

        }

        //$this->flash->addMessage('success', 'velkommen'); TODO

        return $response->withRedirect($this->router->pathFor('dashboard.overview'));
    }

    /**
     * @param Response $response
     * @param $uid
     *
     * @return Response
     */
    public function getLinkAccounts(Response $response, $uid): Response {

        $userSocial = UserSocial::with([])->where('link_uid', '=', $uid)->first();

        return $this->view->render($response, '/auth/link-accounts.twig', [

            'pageHead'      => "back",
            'pageTitle'     => $this->translator->get('auth.ula.page_title'),

            'setup'         => $this->appSetup,
            'locales'       => $this->locales,

            'uid'           => $uid,
            'auth'          => $userSocial,
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $uid
     *
     * @return void
     */
    public function postLinkAccounts(Request $request, Response $response, $uid) {

        $lookupUser     = User::with([])->where('email', '=', $request->getParam('email'))->first();

        /**
         * doing a check on the users credentials
         */
        $credentials = [

            'email'    => $request->getParam('email'),
            'password' => $request->getParam('password')
        ];

//        $user       = Sentinel::findById($lookupUser->id);
//        $validate   = Sentinel::validateCredentials($user, $credentials);  TODO

        /**
         * If the user passes the credentials-check?...
         * We can then proceed with updating the database
         * row with the user_id for reference (eg. linking)
         */
//        if ($validate) {
//
//            $userSocial = UserSocial::with([])->where('link_uid', '=', $uid)->first();
//
//            if ($userSocial) {
//
//                $userSocial->update([
//
//                    'user_id' => $user->id,
//                ]);
//
//                /**
//                 * attempt to sign the user in...
//                 */
//                Sentinel::login($user);
//
//            } else {
//
//                //$this->flash->addMessage('success', 'velkommen'); TODO
//                dump("user_social record not found?!");
//                die;
//
//            }
//
//        } else {
//
//            //$this->flash->addMessage('success', 'velkommen'); TODO
//
//            $this->flash->addMessage('danger', 'Hmm ?! Prøv igen...');
//
//            return $response->withRedirect($this->router->pathFor('auth.sso.link-accounts', ['uid' => $uid]));
//
//        }

        //$this->flash->addMessage('success', 'velkommen'); TODO

        return $response->withRedirect($this->router->pathFor('dashboard.overview'));
    }
}