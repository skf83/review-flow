<?php

namespace app\middleware\security;

use Slim\{
    Views\Twig,
    Csrf\Guard
};

class CsrfViewMiddleware {

    protected Twig $view;
    protected Guard $csrf;

    /**
     * CsrfViewMiddleware constructor.
     *
     * @param Twig $view
     * @param Guard $csrf
     */
    public function __construct(Twig $view, Guard $csrf) {

        $this->view = $view;
        $this->csrf = $csrf;
    }

    /**
     * @param $request
     * @param $response
     * @param $next
     *
     * @return mixed
     */
    public function __invoke($request, $response, $next) {

        $this->view->getEnvironment()->addGlobal('csrf', [

            'field' => '
                <input type="hidden" name="' . $this->csrf->getTokenNameKey() . '" value="' . $this->csrf->getTokenName() . '">
                <input type="hidden" name="' . $this->csrf->getTokenValueKey() . '" value="' . $this->csrf->getTokenValue() . '">
            '
        ]);

        return $next($request, $response);
    }
}
