<?php

namespace app\middleware\other;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class CurrentRouteMiddleware {

    /**
     * @param Request $request
     * @param Response $response
     * @param $next
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $next) : Response {

        $currentUri = $_SERVER['REQUEST_URI'];

        if ($response->getStatusCode() == 200) {

            /**
             * exclude certain routes from updating $_SESSION['currentRoute']
             */
            switch ($currentUri) {

                /**
                 * NOT allowed...
                 */
                //case fnmatch('/*/service-worker.min.js', $request->getUri('uri')->getPath()):
                case fnmatch('/public/assets/ic_app_logo_full.png', $currentUri):
                case fnmatch('/public/assets/ic_flag_.svg', $currentUri):
                case fnmatch('/api/auth/fetch-token', $currentUri):
                case fnmatch('/backup/database', $currentUri):
                case fnmatch('/setup/app/switch/color', $currentUri):
                case fnmatch('/setup/app/switch/sidebar-type', $currentUri):
                case fnmatch('/setup/app/toggle/navbar-fixed', $currentUri):

                break;

                /**
                 * ALLOWED!
                 */
                default:

                    $currentRoute = $currentUri;

                    $_SESSION['currentRoute'] = $currentRoute;
            }
        }

        return $next($request, $response);
    }
}
