<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Author Information
    |--------------------------------------------------------------------------
    |
    | Set the details of the package author.
    |
     */

    'author' => [
        'name' => 'Vironeer',
        'email' => 'support@vironeer.com',
        'website' => 'https://vironeer.com',
        'profile' => 'https://codecanyon.net/user/vironeer',
    ],

    /*
    |--------------------------------------------------------------------------
    | Item Information
    |--------------------------------------------------------------------------
    |
    | Define information about the package item.
    |
     */

    'item' => [
        'alias' => 'fowtickets',
        'version' => '2.1',
    ],

    /*
    |--------------------------------------------------------------------------
    | Demo Mode
    |--------------------------------------------------------------------------
    |
    | Enable or disable the system demo mode.
    |
     */

    'demo_mode' => env('SYSTEM_DEMO_MODE', false),

    /*
    |--------------------------------------------------------------------------
    | License Information
    |--------------------------------------------------------------------------
    |
    | Set the API endpoint and type for license validation.
    |
     */

    'license' => [
        'api' => 'http://license.vironeer.com/api/v1/license',
        'type' => env('SYSTEM_LICENSE_TYPE', 1),
    ],

    /*
    |--------------------------------------------------------------------------
    | Installation Settings
    |--------------------------------------------------------------------------
    |
    | Configure various installation settings.
    |
     */

    'install' => [
        'requirements' => env('INSTALL_REQUIREMENTS', false),
        'file_permissions' => env('INSTALL_FILE_PERMISSIONS', false),
        'license' => env('INSTALL_LICENSE', false),
        'database_info' => env('INSTALL_DATABASE_INFO', false),
        'database_import' => env('INSTALL_DATABASE_IMPORT', false),
        'complete' => env('INSTALL_COMPLETE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend Styles
    |--------------------------------------------------------------------------
    |
    | Specify CSS files for the frontend.
    |
     */

    'frontend' => [
        'colors' => 'assets/css/colors.css',
        'custom_css' => 'assets/css/custom.css',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Styles
    |--------------------------------------------------------------------------
    |
    | Specify CSS files for the admin section.
    |
     */

    'admin' => [
        'colors' => 'assets/vendor/admin/css/colors.css',
        'custom_css' => 'assets/vendor/admin/css/custom.css',
    ],
];
