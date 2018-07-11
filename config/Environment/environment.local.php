<?php
/**
 * Configure settings.
 *
 * Each setting will be merged via
 * Hash::merge(Configure::read(), Hash::expand($configure))
 *
 * This is an example local development environment configuration.
 * Create a copy of this file as "environment.local.php", adjust it to your local development environment AND
 * exclude it from version control.
 * -> git: via .gitignore "app/Config/Environment/environment.local.php"
 * -> svn: via svn:ignore "app/Config/Environment/environment.local.php"
 */
$configure = [
    'debug' => false,

    'Datasources.default' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'open_lib',
        'quoteIdentifiers' => true,
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Mysql'
    ],

    'Datasources.test' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'open_lib',
        'quoteIdentifiers' => true,
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Mysql'
    ],

    'Email.default' => [
        'transport' => 'default',
        'from' => 'example@example.com'
    ]
];
