<?php

return [

    'driver' => env('MAIL_DRIVER', 'sparkpost'),

    //'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
    
    'host' => env('MAIL_HOST', 'smtp.googlemail.com'),

    'port' => env('MAIL_PORT', 587), // old port 587

    'from' => ['address' => 'tomiot8485@gmail.com', 'name' => 'tomiot8485'],

    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),

    'username' => env('tvtri1997@gmail.com'),

    'password' => env('a1b3cd5782'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
