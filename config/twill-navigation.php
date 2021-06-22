<?php

return [
     'settings' => [
         'title' => 'Instellingen',
         'route' => 'admin.settings',
         'params' => ['section' => 'facebook'],
         'primary_navigation' => [
             'homepage' => [
                 'title' => 'Facebook',
                 'route' => 'admin.settings',
                 'params' => ['section' => 'facebook'],
             ],
         ],
     ],
    'homepages' => [
        'title' => 'Homepagina',
        'route' => 'admin.homepage',
    ],
    'pages' => [
        'title' => 'Pagina\'s',
        'module' => true,
    ],
    'municipalities' => [
        'title' => 'Gemeentes',
        'module' => true,
    ],
    'farmers' => [
        'title' => 'Boeren',
        'module' => true,
    ],
    'newsItems' => [
        'title' => 'Nieuwsberichten',
        'module' => true,
    ],
    'projects' => [
        'title' => 'Projecten',
        'module' => true,
    ],
    'donationpages' => [
        'title' => 'Doneren',
        'route' => 'admin.donationPage',
    ],
];
