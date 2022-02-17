<?php
// config for Pieterf/LaravelIngIdealAdvanced
return [
    'merchant_id' => env('IDEAL_MERCHANT_ID', ''),

    'acquirer_url' => env('IDEAL_ACQUIRER_URL', ''),

    'expiration_period' => env('IDEAL_EXPIRATION_PERIOD', 60),

    'acquirer_certificate' => storage_path('ideal-keys/ideal_v3.cer'),
    'certificate' => storage_path('ideal-keys/cert.cer'),
    'private_key' => storage_path('ideal-keys/priv.pem'),

    'passphrase' => env('IDEAL_PRIVATE_KEY_PASSWORD', ''),
];
