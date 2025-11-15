<?php

return [
    'name' => 'SurgiCare - Healthcare Appointments',
    'short_name' => 'SurgiCare',
    'start_url' => '/',
    'background_color' => '#ffffff',
    'theme_color' => '#0d6efd', // Bootstrap primary blue or your brand color
    'display' => 'standalone',
    'orientation' => 'portrait',
    'status_bar' => 'default',
    'icons' => [       
        '192x192' => [
            'path' => '/images/icons/icon-192x192.png',
            'purpose' => 'any'
        ], 
        '512x512' => [
            'path' => '/images/icons/icon-512x512.png',
            'purpose' => 'any'
        ],
    ],
    'splash' => [
        '640x1136' => '/images/splash/splash-640x1136.png',
        '750x1334' => '/images/splash/splash-750x1334.png',
        '1242x2208' => '/images/splash/splash-1242x2208.png',
        '1125x2436' => '/images/splash/splash-1125x2436.png',
    ],
    'shortcuts' => [
        [
            'name' => 'Book Appointment',
            'description' => 'Book a new appointment',
            'url' => '/appointments/create',
            'icons' => [
                "src" => "/images/icons/book-icon.png",
                "purpose" => "any"
            ]
        ],
        [
            'name' => 'My Appointments',
            'description' => 'View your appointments',
            'url' => '/appointments',
            'icons' => [
                "src" => "/images/icons/appointments-icon.png",
                "purpose" => "any"
            ]
        ]
    ],
    'custom' => []
];