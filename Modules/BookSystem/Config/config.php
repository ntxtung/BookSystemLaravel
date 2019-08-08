<?php

return [
    'name' => 'BookSystem',

    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
//        'web' => [
//            'driver' => 'session',
//            'provider' => 'users',
//        ],

        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
//            'hash' => false,
        ],
    ],
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => Modules\BookSystem\Domain\Entities\Users::class,
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
        ],
    ],

];
