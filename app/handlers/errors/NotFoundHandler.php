<?php

namespace app\handlers\errors;

//use app\models\data\Locale;
//use app\models\data\Setup;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

use Slim\{
    Handlers\NotFound,
    Views\Twig
};

///**
// * @property Locale[]|Builder[]|Collection $locales
// * @property Setup[]|Builder[]|Collection $appSetup
// */
class NotFoundHandler extends NotFound {

	private Twig $view;

    /**
     * NotFoundHandler constructor.
     *
     * @param Twig $view
     */
    public function __construct(Twig $view) {

        /*
         * NOTE!
         * Please visit the README.md file
         * at the root, for more info about
         * available app setup options...
         */
        //$this->appSetup     = Setup::with([])->first();

        //$this->locales      = Locale::with([])->where('activated', '=', true)->get();

		$this->view         = $view;
	}

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return response
     */
    public function __invoke(Request $request, Response $response) : response {

		parent::__invoke($request, $response);

		$this->view->render($response, '/errors/404.twig', [

            //'setup'     => $this->appSetup,
            //'locales'   => $this->locales,
        ]);

		return $response->withStatus(404);
	}
}
