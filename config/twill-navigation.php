<?php

return [
    'settings' => [
        'title' => 'Settings',
        'route' => 'admin.settings',
        'params' => ['section' => 'homepage'],
        'primary_navigation' => [
            'homepage' => [
                'title' => 'Homepage',
                'route' => 'admin.settings',
                'params' => ['section' => 'homepage']
            ],
        ]
    ],
    'pages' => [
        'title' => 'Pagina\'s',
        'module' => true
    ],
    'municipalities' => [
        'title' => 'Gemeentes',
        'module' => true
    ],
    'farmers' => [
        'title' => 'Boeren',
        'module' => true
    ]
];

