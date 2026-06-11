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
    'gateway' => env('PAYMENT_GATEWAY', 'doku'),

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

];
