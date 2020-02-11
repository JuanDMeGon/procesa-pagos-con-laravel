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

    'currency_conversion' => [
        'base_uri' => env('CURRENCY_CONVERSION_BASE_URI'),
        'api_key' => env('CURRENCY_CONVERSION_API_KEY'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'mercadopago' => [
        'base_uri' => env('MERCADOPAGO_BASE_URI'),
        'key' => env('MERCADOPAGO_KEY'),
        'secret' => env('MERCADOPAGO_SECRET'),
        'base_currency' => 'cop',
        'class' => App\Services\MercadoPagoService::class,
    ],

    'paypal' => [
        'base_uri' => env('PAYPAL_BASE_URI'),
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET'),
        'class' => App\Services\PayPalService::class,
    ],

    'payu' => [
        'base_uri' => env('PAYU_BASE_URI'),
        'account_id' => env('PAYU_BASE_ACCOUNT_ID'),
        'merchant_id' => env('PAYU_BASE_MERCHANT_ID'),
        'key' => env('PAYU_KEY'),
        'secret' => env('PAYU_SECRET'),
        'base_currency' => 'cop',
        'class' => App\Services\PayUService::class,
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'stripe' => [
        'base_uri' => env('STRIPE_BASE_URI'),
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'class' => App\Services\StripeService::class,
    ],

];
