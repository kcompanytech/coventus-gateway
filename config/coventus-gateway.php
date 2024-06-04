<?php

// config for Kcompany/CoventusGateway
return [
    'coventus' => [
        'client_id' => env('COVENTUS_CLIENT_ID', 'default-client-id'),
        'api_key' => env('COVENTUS_KEY', 'default-api'),
        'base_url' => env('COVENTUS_BASE_URL', 'default-base-url'),
    ],
];
