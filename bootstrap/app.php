<?php

session_start();

/**
 * Imports
 */
use app\App;

use app\views\Factory;

use Cartalyst\Sentinel\Native\{
    Facades\Sentinel,
    SentinelBootstrapper
};

use Illuminate\{
    Pagination\LengthAwarePaginator,
    Pagination\Paginator
};

use Noodlehaus\Config;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Setting up : APP
 */
$app = new App;

/**
 * Booting up other app functionalities
 */
require __DIR__ . '/database.php';
require __DIR__ . '/middleware.php';
require __DIR__ . '/routes.php';
require __DIR__ . '/validations.php';

/**
 * setting up : PAGINATION
 */
LengthAwarePaginator::viewFactoryResolver(function () use ($app) {

    return new Factory($app->getContainer()->get(Config::class));
});

LengthAwarePaginator::defaultView('./home/_partials/paginator.twig');

Paginator::currentPathResolver(function () {

    return isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
});

Paginator::currentPageResolver(function () {

    return $_GET['page'] ?? 1;
});

/**
 * Setting up : SENTINEL
 */
Sentinel::instance(
    new SentinelBootstrapper($app->getContainer()->get(Config::class)->get('auth'))
);