<?php

// config for PropaySystems/Utilities
return [

    /*
    |--------------------------------------------------------------------------
    | Translation Helper
    |--------------------------------------------------------------------------
    |
    | Set the default path for the translation files
    |
    */
    'translation_helper' => [
        'path' => env('TRANSLATION_HELPER_PATH', 'db'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Save To Upper
    |--------------------------------------------------------------------------
    |
    | Exclude fields when converting to uppercase
    |
    */
    'save_to_upper' => [
        'exclusions' => [
            'email',
            'import_note',
            'email',
            'email_secondary',
            'password',
            'remember_token',
            'avatar',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Trigger
    |--------------------------------------------------------------------------
    |
    | Enable or disable database triggers
    |
    */
    'trigger' => [
        'enable_trigger' => env('ENABLE_TRIGGER', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Gender Code
    |--------------------------------------------------------------------------
    |
    | This gender code is used mostly in the id number helper.
    |
    */
    'gender' => [
        'male' => 1,
        'female' => 2,
        'unknown' => 3,
    ],

];
