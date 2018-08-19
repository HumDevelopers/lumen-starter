<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DATABASE_DRIVER', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [
        'testing' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ],

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => env('DATABASE_DB', base_path('database/database.sqlite')),
            'prefix'   => env('DATABASE_PREFIX', ''),
        ],

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DATABASE_HOST', 'localhost'),
            'port'      => env('DATABASE_PORT', 3306),
            'database'  => env('DATABASE_DB', 'lumen'),
            'username'  => env('DATABASE_USERNAME', 'homestead'),
            'password'  => env('DATABASE_PASSWORD', 'secret'),
            'charset'   => env('DATABASE_CHARSET', 'utf8mb4'),
            'collation' => env('DATABASE_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix'    => env('DATABASE_PREFIX', ''),
            'timezone'  => env('DATABASE_TIMEZONE', '+00:00'),
            'strict'    => env('DATABASE_STRICT_MODE', false),
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DATABASE_HOST', 'localhost'),
            'port'     => env('DATABASE_PORT', 5432),
            'database' => env('DATABASE_DB', 'lumen'),
            'username' => env('DATABASE_USERNAME', 'homestead'),
            'password' => env('DATABASE_PASSWORD', 'secret'),
            'charset'  => env('DATABASE_CHARSET', 'utf8'),
            'prefix'   => env('DATABASE_PREFIX', ''),
            'schema'   => env('DATABASE_SCHEMA', 'public'),
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [
        'cluster' => env('REDIS_CLUSTER', false),

        'default' => [
            'host'     => env('REDIS_HOST', '127.0.0.1'),
            'port'     => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DATABASE', 0),
            'password' => env('REDIS_PASSWORD', null),
        ],

    ],
];
