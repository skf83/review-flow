<?php

namespace app\middleware\security\back;

use Element\Sentinel\Sentinel;

use Slim\Router;

class GuestMiddleware {

    protected Router $router;

    /**
     * GuestMiddleware constructor.
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
         * Redirect to dashboard overview IF the user IS signed in
         */
        if (!Sentinel::guest()) {

            return $response->withRedirect($this->router->pathFor('dashboard.overview'));
        }

        return $next($request, $response);
    }
}
