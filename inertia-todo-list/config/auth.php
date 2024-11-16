<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'user',
        'passwords' => 'users',
    ],


    'guards' => [
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'hospital' => [
            'driver' => 'session',
            'provider' => 'hospitals',
        ],
    
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

   

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'hospitals' => [
            'driver' => 'eloquent',
            'model' => App\Models\Doctors::class,
        ],
    
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],



    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],


    'password_timeout' => 10800,

];
