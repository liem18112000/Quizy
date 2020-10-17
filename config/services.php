<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '792697661495360',
        'client_secret' => '2f57d4a576ef6acb6363dddd92230ade',
        'redirect' => 'http://localhost/Quizy/public/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '229526496579-9s27j1toobppacglausibfue7se4elfh.apps.googleusercontent.com',
        'client_secret' => 'sk7ylz1Owp17A-Vy-ArP1TeR',
        'redirect' => 'http://localhost/Quizy/public/login/google/callback',
    ],

];
