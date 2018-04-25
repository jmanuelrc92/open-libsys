<?php
/**
 * Configure settings.
 *
 * Each setting will be merged via
 * Hash::merge(Configure::read(), Hash::expand($configure))
 */
$configure = [
    'debug' => true,

    'Datasources.default' => [
        'host' => 'ec2-54-83-204-6.compute-1.amazonaws.com',
        'username' => 'ouifhacoxsynge',
        'password' => '61e199cd8737638c12d556c8f652d9965deb641f08b24f8ab1477b8ab474bf6f',
        'database' => 'd934sa23eunjmv',
        'prefix' => '',
        'quoteIdentifiers' => true,
        'port' => '5432'
    ],

    'Datasources.test' => [
        'host' => 'ec2-54-83-204-6.compute-1.amazonaws.com',
        'username' => 'ouifhacoxsynge',
        'password' => '61e199cd8737638c12d556c8f652d9965deb641f08b24f8ab1477b8ab474bf6f',
        'database' => 'd934sa23eunjmv',
        'prefix' => '',
        'quoteIdentifiers' => true,
        'port' => '5432'
    ],

    'Email.default' => [
        'transport' => 'default',
        'from' => 'example@example.com'
    ]
];
