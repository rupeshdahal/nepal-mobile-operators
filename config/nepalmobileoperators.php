<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Custom Operators Configuration
    |--------------------------------------------------------------------------
    |
    | You can add or modify operator configurations here if needed
    | This could be used to add new operators or update existing ones
    |
    */

    'custom_operators' => [
        // Add additional operators here if needed
        // Example:
        // 'New Operator' => [
        //     'prefixes' => ['990'],
        //     'technology' => 'GSM'
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Settings
    |--------------------------------------------------------------------------
    |
    | Configure validation behavior
    |
    */

    'validation' => [
        'strict_length' => true, // Enforce 10-digit length for Nepal mobile numbers
    ],
];
