<?php

namespace app\controllers;

use app\validations\contracts\ValidatorInterface;

use app\handlers\{
    mailer\Mailer
};

use app\models\{
    data\Locale,
    data\Setup,
    data\User
};

use Illuminate\Translation\Translator;

use Interop\Container\ContainerInterface;

use Noodlehaus\Config;

use Slim\{
    Flash\Messages as Flash,
    Router,
    Views\Twig
};

/**
 * @property \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null $appSetup
 * @property \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection $locales
 */
class BaseController {

    /**
     * BaseController dependencies
     */
    protected Config $config;
    protected ContainerInterface $container;
    protected Flash $flash;
    protected Mailer $mailer;
    protected Router $router;
    protected Translator $translator;
    protected User $user;
    protected Twig $view;
    protected ValidatorInterface $validator;

    /**
     * BaseController constructor.
     *
     * @param Config $config
     * @param ContainerInterface $container
     * @param Flash $flash
     * @param Mailer $mailer
     * @param Router $router
     * @param Translator $translator
     * @param User $user
     * @param ValidatorInterface $validator
     * @param Twig $view
     */
    public function __construct(Config $config, ContainerInterface $container, Flash $flash, Mailer $mailer, Router $router, Translator $translator, User $user, ValidatorInterface $validator, Twig $view) {

        /*
         * NOTE!
         * Please visit the README.md file
         * at the root, for more info about
         * available app setup options...
         */
        $this->appSetup     = Setup::with([])->first();

        $this->locales      = Locale::with([])->where('activated', '=', true)->get();

        $this->config       = $config;
        $this->container    = $container;
        $this->flash        = $flash;
        $this->mailer       = $mailer;
        $this->router       = $router;
        $this->translator   = $translator;
        $this->user         = $user;
        $this->validator    = $validator;
        $this->view         = $view;
    }

    /**
     * @param $property
     *
     * @return mixed
     */
    public function __get($property) {

        if($this->container->{$property}) {

            return $this->container->{$property};

        } else {

            return null;

        }
    }
}
