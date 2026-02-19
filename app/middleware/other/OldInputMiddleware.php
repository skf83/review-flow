<?php

namespace app\middleware\other;

use Slim\Views\Twig;

class OldInputMiddleware {

	protected Twig $view;

    /**
     * OldInputMiddleware constructor.
     *
     * @param Twig $view
     */
    public function __construct(Twig $view) {

		$this->view = $view;
	}

	public function __invoke($request, $response, $next) {

		if (isset($_SESSION['old'])) {

			$this->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
		}

		$_SESSION['old'] = $request->getParams();

        return $next($request, $response);
	}
}
