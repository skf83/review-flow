<?php

namespace app\middleware\security\api;

use app\handlers\auth\jwt\JwtAuth;

use Exception;

use Slim\Http\{
    Request,
    Response
};

class JwtAuthenticateMiddleware {

    protected JwtAuth $auth;

    /**
     * JwtAuthenticateMiddleware constructor.
     * @param JwtAuth $auth
     */
    public function __construct(JwtAuth $auth) {

        $this->auth = $auth;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $next
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $next) : Response {

        if (!$header = $this->getAuthorizationHeader($request)) {

            return $response->withJson([

                'message' => "Call to api failed : No JWT token was provided!?"

            ], 401);
        }

        try {

            $this->auth->authenticate($header);

        } catch (Exception $error) {

            return $response->withJson([

                'message' => $error->getMessage()

            ], 401);
        }

        return $next($request, $response);
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    protected function getAuthorizationHeader(Request $request) : string {

        if (!list($header) = $request->getHeader('Authorization', false)) {

            return false;
        }

        return $header;
    }
}
