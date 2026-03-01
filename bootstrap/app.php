<?php

// Meget tidligt i din bootstrap
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Starting sessions
 */
session_set_cookie_params([

    'lifetime' => 0,        // session-only cookie (expires on browser close)
    'path'     => '/',
    'secure'   => !empty($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax',
]);

session_start();

/**
 * Imports
 */
use app\App;

use app\views\Factory;

use Element\Sentinel\Sentinel;

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
 * Setting up : AUTH -> Sentinel
 */
Sentinel::deploy($app->getContainer()->get(Config::class)->get('sentinel'));

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