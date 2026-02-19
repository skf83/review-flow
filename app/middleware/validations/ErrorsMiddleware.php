<?php

namespace app\middleware\validations;

use Slim\Views\Twig;

class ErrorsMiddleware {

	protected Twig $view;

    /**
     * ValidationErrorMiddleware constructor.
     *
     * @param Twig $view
     */
    public function __construct(Twig $view) {

		$this->view = $view;
	}

    /**
     * @param $request
     * @param $response
     * @param $next
     *
     * @return mixed
     */
    public function __invoke($request, $response, $next) {

		if (isset($_SESSION['errors'])) {

			$this->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
			unset($_SESSION['errors']);
		}

        return $next($request, $response);
	}
}
