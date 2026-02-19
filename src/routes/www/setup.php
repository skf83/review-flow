<?php

/**
 * OUTER Group that applies CSRF to routes
 *
 * @var $app
 *
 */
$app->group('/setup', function () use($app) {

    $app->group('/app', function () use($app) {

        /**
         * method for : APP -> SWITCH -> COLOR
         */
        $app->post('/switch/color', ['app\controllers\SetupController', 'switchAppColor'])->setName('setup.app.switch.color');

        /**
         * method for : APP -> SWITCH -> SIDEBAR TYPE
         */
        $app->post('/switch/sidebar-type', ['app\controllers\SetupController', 'switchSidebarType'])->setName('setup.app.switch.sidebar-type');

        /**
         * method for : APP -> TOGGLE -> NAVBAR FIXED
         */
        $app->post('/toggle/navbar-fixed', ['app\controllers\SetupController', 'toggleNavbarFixed'])->setName('setup.app.toggle.navbar-fixed');

    });

});