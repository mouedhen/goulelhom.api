<?php

return [

    'version' => env('API_VERSION', 'v1'),

    'facebook' => [
        'app_id' => env('FACEBOOK_APP_ID'),
        'app_secret' => env('FACEBOOK_APP_SECRET'),
        'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION'),
        'default_access_token' => env('FACEBOOK_DEFAULT_ACCESS_TOKEN'),
    ]
];