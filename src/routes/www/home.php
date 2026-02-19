<?php

/**
 * OUTER Group that applies CSRF to routes
 *
 * @var $app
 *
 */
$app->group('', function () use($app) {

    /**
     * rendering view : HOME
     */
    $app->get('/', ['app\controllers\HomeController', 'getHome'])->setName('home');

});
