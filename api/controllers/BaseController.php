<?php

namespace api\controllers;

use app\handlers\{
    auth\jwt\JwtAuth,
    mailer\Mailer
};

use Illuminate\Translation\Translator;

use Interop\Container\ContainerInterface;

use Noodlehaus\Config;

class BaseController {

    /**
     * BaseController dependencies
     */
    protected Config $config;
    protected ContainerInterface $container;
    protected JwtAuth $jwt;
    protected Mailer $mailer;
    protected Translator $translator;

    /**
     * BaseController constructor.
     *
     * @param Config $config
     * @param ContainerInterface $container
     * @param JwtAuth $jwt
     * @param Mailer $mailer
     * @param Translator $translator
     */
    public function __construct(Config $config, ContainerInterface $container, JwtAuth $jwt, Mailer $mailer, Translator $translator) {

        $this->config       = $config;
        $this->container    = $container;
        $this->jwt          = $jwt;
        $this->mailer       = $mailer;
        $this->translator   = $translator;
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
