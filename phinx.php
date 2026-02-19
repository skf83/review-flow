<?php

use app\App;

use Dotenv\Dotenv;
use Noodlehaus\Config;

/* APP */
$app = new App();

/* APP -> CONTAINER */
$container = $app->getContainer();

/* APP -> CONFIGS */
$config = $container->get(Config::class);

/* APP -> MODE */
$appmode = Dotenv::createImmutable(__DIR__ . '/', 'mode.env');
$appmode->load();

/**
 * PHINX config file
 */
return [

    'paths' => [

        'migrations' => 'database/migrations',
        'seeds'      => 'database/seeds'
    ],

    'migration_base_class' => 'app\models\migrations\Migration',

    'templates' => [

        'file' => 'app/console/stubs/migration.stub'
    ],

    'environments' => [

        'default_migration_table' => 'migrations',

        'default_environment' => $_ENV["APP_MODE"],

        'development' => [

            'adapter' => $config->get('db.mysql.driver'),
            'host'    => $config->get('db.mysql.host'),
            'port'    => $config->get('db.mysql.port'),
            'name'    => $config->get('db.mysql.database'),
            'user'    => $config->get('db.mysql.user'),
            'pass'    => $config->get('db.mysql.password'),

        ],

        'production' => [

            'adapter' => $config->get('db.mysql.driver'),
            'host'    => $config->get('db.mysql.host'),
            'port'    => $config->get('db.mysql.port'),
            'name'    => $config->get('db.mysql.database'),
            'user'    => $config->get('db.mysql.user'),
            'pass'    => $config->get('db.mysql.password'),

        ]
    ]
];
