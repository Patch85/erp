<?php
/*
|--------------------------------------------------------------------------
| Dev Config
|--------------------------------------------------------------------------
|
| These values should be used in a development environment for seeding,
| testing, etc.
|
*/

return [
    /*
    |--------------------------------------------------------------------------
    | Dev User Model
    |--------------------------------------------------------------------------
    |
    | These values should be used for seeding a development user based on values
    | as defined in the .env file, with fallbacks defined here
    |
    */
    'first_name' => env('DEV_USER_FIRST_NAME', 'Bob'),
    'middle_name' => env('DEV_USER_MIDDLE_NAME', null),
    'last_name' => env('DEV_USER_LAST_NAME', 'McTesterson'),
    'display_name' => env('DEV_USER_DISPLAY_NAME', 'bTesty'),
    'email' => env('DEV_USER_EMAIL', 'bTesty@example.com'),
    'password' => env('DEV_USER_PASSWORD', 'password'),
];
