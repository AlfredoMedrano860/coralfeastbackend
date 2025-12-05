<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Configure how your application handles cross-origin resource requests.
    | Adjust the allowed origins so they match the hosts that serve your
    | front-end. When credentials are included in the request, the allowed
    | origin must never be the wildcard "*".
    |
    */

    'paths' => [
        'api/*',
        'broadcasting/auth',
        'sanctum/csrf-cookie',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://coralfeast.onrender.com',
        'https://thecoralfeast.onrender.com',
        'http://127.0.0.1:5502',
        'http://localhost:5502',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => ['*'],

    'max_age' => 0,

    'supports_credentials' => true,

];
