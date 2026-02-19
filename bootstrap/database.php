<?php global $app;

use Illuminate\{
    Database\Capsule\Manager as Capsule,
    Events\Dispatcher as EventDispatcher,
};

use Noodlehaus\Config;

/**
 * Adding config to our database connection
 */
$config = $app->getContainer()->get(Config::class);

/**
 * Setting up : APP -> DATABASE CONNECTION (CAPSULE)
 */
$capsule = new Capsule;
$capsule->addConnection([

    'driver'    => $config->get('db.mysql.driver'),
    'host'      => $config->get('db.mysql.host'),
    'port'      => $config->get('db.mysql.port'),
    'database'  => $config->get('db.mysql.database'),
    'username'  => $config->get('db.mysql.user'),
    'password'  => $config->get('db.mysql.password'),
    'charset'   => $config->get('db.mysql.charset'),
    'collation' => $config->get('db.mysql.collation'),
    'prefix'    => $config->get('db.mysql.prefix'),

]);
$capsule->setEventDispatcher(new EventDispatcher);
$capsule->setAsGlobal();
$capsule->bootEloquent();