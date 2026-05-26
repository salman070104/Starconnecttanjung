<?php

return [
    'server_key' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-xWzF2p_yR_lQ2eLq28H9vR9T'), // Dummy sandbox key
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-r2E_sBw_L2v_2v2v'), // Dummy sandbox key
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sanitized' => true,
    'is_3ds' => true,
];
