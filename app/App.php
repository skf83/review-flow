<?php

namespace app;

use DI\{
    ContainerBuilder,
    Bridge\Slim\App as DIBridge
};

use Dotenv\Dotenv;

class App extends DIBridge {

    /**
     * @param ContainerBuilder $builder
     *
     * @return void
     */
    protected function configureContainer(ContainerBuilder $builder) : void {

        /**
         * Setting up : APP -> MODE
         */
        $appmode = Dotenv::createImmutable(__DIR__ . '/../', 'mode.env');
        $appmode->load();

        /**
         * Add settings(s) :
         */
        $builder->addDefinitions([

            'settings.displayErrorDetails'                  => $_ENV["APP_MODE"] == "development", // true IF APP_MODE is set to "development" otherwise its false
            'settings.addContentLengthHeader'               => false,
            'settings.determineRouteBeforeAppMiddleware'    => true

        ]);

        /**
         * Adding container :
         */
        $builder->addDefinitions(__DIR__ . '/container.php');

    }

}
