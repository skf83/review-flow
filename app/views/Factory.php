<?php

namespace app\views;

use Noodlehaus\Config;
use Slim\Views\Twig;
use Twig\Error\LoaderError;

class Factory {

    /**
     * Factory dependencies
     */
    protected Config $config;
    protected $view;

    /**
     * @param Config $config
     */
    public function __construct(Config $config) {

        $this->config = $config;
    }

    /**
     * @param Config $config
     *
     * @return Twig
     */
    public static function getEngine(Config $config) : Twig {

        return new Twig(__DIR__ . '/../../src/views', [

            'cache' => $config->get('storage.view.cache.path'),
            'debug' => $config->get('app.debug')
        ]);
    }

    /**
     * @param $view
     * @param array $data
     *
     * @return $this|void
     */
    public function make($view, array $data = []) {

        try {

            $this->view = static::getEngine($this->config)->fetch($view, $data);

        } catch (LoaderError $error) {

            dump($error);
            die;

        }

        return $this;
    }

    public function render() {

        return $this->view;
    }
}
