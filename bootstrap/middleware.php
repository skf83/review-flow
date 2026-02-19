<?php global $app;

use app\middleware\{
    other\CurrentRouteMiddleware,
    other\OldInputMiddleware,
    validations\ErrorsMiddleware
};

use Slim\Views\Twig;

/**
 * Adding view to our database connection
 */
$view = $app->getContainer()->get(Twig::class);

/**
 * setting up : MIDDLEWARE
 */
/* -> CURRENT ROUTE */
$app->add(new CurrentRouteMiddleware());
/* -> OLD INPUT */
$app->add(new OldInputMiddleware($view));
/* -> VALIDATION */
$app->add(new ErrorsMiddleware($view));