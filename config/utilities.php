<?php

// config for PropaySystems/Utilities
return [


    'translation_helper' => [
        'path' => env('TRANSLATION_HELPER_PATH', 'db'),
    ],

    'save_to_upper' => [
        'exclusions' => [
            'email',
            'import_note',
            'email',
            'email_secondary',
            'password',
            'remember_token',
            'avatar',
        ]
    ],

    'trigger' => [
        'enable_trigger' => env('ENABLE_TRIGGER', false)
    ],

];
