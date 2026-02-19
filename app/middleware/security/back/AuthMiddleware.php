<?php

namespace app\middleware\security\back;

use Cartalyst\Sentinel\Native\Facades\Sentinel;

use Slim\Router;

class AuthMiddleware {

    protected Router $router;

    /**
     * AuthMiddleware constructor.
     *
     * @param Router $router
     */
	public function __construct(Router $router) {

        $this->router   = $router;
	}

	/**
	 * @param $request
	 * @param $response
	 * @param $next
	 *
	 * @return mixed
	 */
	public function __invoke($request, $response, $next) {

        /**
         * Redirect to signin IF the user is NOT signed in
         */
        if (Sentinel::guest()) {

            return $response->withRedirect($this->router->pathFor('auth.sign-in'));
        }

        return $next($request, $response);
	}
}
