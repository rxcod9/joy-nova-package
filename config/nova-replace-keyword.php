<?php

return [

    /*
     * If enabled for nova-replace-keyword package.
     */
    'enabled' => env('NOVA_REPLACE_KEYWORD_ENABLED', true),

    /*
    | Here you can specify for which data type slugs replace-keyword is enabled
    | 
    | Supported: "*", or data type slugs "users", "roles"
    |
    */

    'allowed_slugs' => array_filter(explode(',', env('NOVA_REPLACE_KEYWORD_ALLOWED_SLUGS', '*'))),

    /*
    | Here you can specify for which data type slugs replace-keyword is not allowed
    | 
    | Supported: "*", or data type slugs "users", "roles"
    |
    */

    'not_allowed_slugs' => array_filter(explode(',', env('NOVA_REPLACE_KEYWORD_NOT_ALLOWED_SLUGS', ''))),

    /*
     * The config_key for nova-replace-keyword package.
     */
    'config_key' => env('NOVA_REPLACE_KEYWORD_CONFIG_KEY', 'joy-nova-replace-keyword'),

    /*
     * The route_prefix for nova-replace-keyword package.
     */
    'route_prefix' => env('NOVA_REPLACE_KEYWORD_ROUTE_PREFIX', 'joy-nova-replace-keyword'),

    /*
     * The action_permission for nova-replace-keyword package.
     */
    'action_permission' => env('NOVA_REPLACE_KEYWORD_ACTION_PERMISSION', 'browse'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify nova controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\NovaReplaceKeyword\\Http\\Controllers',
    ],
];
