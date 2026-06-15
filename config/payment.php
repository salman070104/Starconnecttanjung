<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Active Payment Gateway
    |--------------------------------------------------------------------------
    |
    | This value determines which payment gateway will be used by default.
    | Supported: "midtrans", "doku"
    |
    */
    'gateway' => env('PAYMENT_GATEWAY', 'midtrans'),

    /*
    |--------------------------------------------------------------------------
    | Doku Jokul Configuration
    |--------------------------------------------------------------------------
    */
    'doku' => [
        'client_id' => env('DOKU_CLIENT_ID'),
        'secret_key' => env('DOKU_SECRET_KEY'),
        'is_production' => env('DOKU_IS_PRODUCTION', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Tripay Configuration
    |--------------------------------------------------------------------------
    */
    'tripay' => [
        'api_key' => env('TRIPAY_API_KEY'),
        'private_key' => env('TRIPAY_PRIVATE_KEY'),
        'merchant_code' => env('TRIPAY_MERCHANT_CODE'),
        'is_production' => env('TRIPAY_IS_PRODUCTION', false),
    ],

];
