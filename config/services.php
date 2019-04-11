<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    //Socialite
    'facebook' => [
        'client_id'     => '126446734665310',
        'client_secret' => '739119781ee76fed62643c06deeb476f',
        'redirect'      => 'http://dothothantai.com/login/callback/facebook',
    ],

    // https://developers.google.com/+/web/signin/
    'google' => [
        'client_id'     => '332347782321-fgaeki4pae905fmheidi83fkj94rujt3.apps.googleusercontent.com',
        'client_secret' => 'Re3EKtSs_s1o2XCnCgi9-vMn',
        'redirect'      => 'http://localhost/dotho/login/callback/google',
    ],

];
