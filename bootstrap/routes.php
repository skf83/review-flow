<?php global $app;

/**
 * Dealing with : CORS
 */
$app->add(function ($req, $res, $next) {

    $response = $next($req, $res);

    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withHeader('Service-Worker-Allowed', '/');
});

/**
 * Setting up : ROUTES
 */
/* -> API */
foreach (glob(__DIR__ . "/../src/routes/api/*.php") as $filename) {

    require_once $filename;
}
/* -> WWW */
foreach (glob(__DIR__ . "/../src/routes/www/*.php") as $filename) {

    require_once $filename;
}