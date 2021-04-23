<?php

return [
    // 'settings' => [
    //     'title' => 'Instellingen',
    //     'route' => 'admin.settings',
    //     'params' => ['section' => 'homepage'],
    //     'primary_navigation' => [
    //         'homepage' => [
    //             'title' => 'Hoofdpagina',
    //             'route' => 'admin.settings',
    //             'params' => ['section' => 'homepage']
    //         ],
    //     ]
    // ],
    'home' => [
        'title' => 'Instellingen',
        'route' => 'admin.homesettings.show',
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
    ],
    'newsItems' => [
        'title' => 'Nieuwsberichten',
        'module' => true,
    ],
    'projects' => [
        'title' => 'Projecten',
        'module' => true
    ],

];

