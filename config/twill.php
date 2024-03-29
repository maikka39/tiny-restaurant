<?php

return [
    'enabled' => [
        'users-management' => true,
        'media-library' => true,
        'file-library' => true,
        'block-editor' => true,
        'buckets' => true,
        'users-image' => true,
        'settings' => true,
        'dashboard' => true,
        'search' => true,
        'users-description' => false,
        'activitylog' => true,
        'users-2fa' => false, // requires imagick
        'users-oauth' => false,
    ],
    'auth_login_redirect_path' => '/admin',
    'dashboard' => [
        'modules' => [
            'App\Models\Farmer' => [
                'name' => 'farmers',
                'label' => 'Boeren',
                'label_singular' => 'Boer',
                'activity' => true,
                'search' => true,
                'create' => true,
                'count' => true,
                'search_fields' => ['name', 'description', 'address'],
            ],
            'App\Models\Page' => [
                'name' => 'pages',
                'label' => 'Pagina\'s',
                'label_singular' => 'Pagina',
                'activity' => true,
                'search' => true,
                'create' => true,
                'count' => true,
                'search_fields' => ['title', 'description'],
            ],
            // 'App\Models\Homepage' => [
            //     'name' => 'homepages',
            //     'label' => 'Voorpagina\'s',
            //     'label_singular' => 'Voorpagina',
            //     'activity' => true,
            //     'search' => true,
            //     'create' => false,
            //     'count' => true,
            //     'search_fields' => ['title', 'description']
            // ],
            'App\Models\Municipality' => [
                'name' => 'municipalities',
                'label' => 'Gemeentes',
                'label_singular' => 'Gemeente',
                'activity' => true,
                'search' => true,
                'create' => true,
                'count' => true,
                'search_fields' => ['title', 'description'],
            ],
            'App\Models\NewsItem' => [
                'name' => 'newsItems',
                'label' => 'Nieuwsberichten',
                'label_singular' => 'Nieuwsbericht',
                'activity' => true,
                'search' => true,
                'create' => true,
                'count' => true,
                'search_fields' => ['title', 'description'],
            ],
        ],
    ],
    'locale' => 'nl',
    'fallback_locale' => 'en',
    'available_user_locales' => [
        'en',
        'nl',
    ],
    'block_editor' => [
        'block_preview_render_childs' => false, // indicates if childs should be rendered when using repeater in blocks
        'blocks' => [
            'social_media_links' => [
                'title' => 'Social Media Links',
                'icon' => 'text',
                'component' => 'a17-block-social_media_links',
            ],
            'contact_link' => [
                'title' => 'Contact Link',
                'icon' => 'text',
                'component' => 'a17-block-contact_link',
            ],
            'text_with_image' => ['component' => 'a17-text-with-image'],
            'contact_form' => ['component' => 'a17-block-contact_form'],
            'location_map' => ['component' => 'a17-block-location_map'],
        ],
        'repeaters' => [
            'social_media_links_item' => [
                'title' => 'Social Media link',
                'trigger' => 'Nieuwe link toevoegen',
                'component' => 'a17-block-social_media_links_item',
            ],
            'partner_items' => ['component' => 'a17-block-partner_items'],
            'homepage_link_items' => ['component' => 'a17-block-homepage_link_items'],
            'donation_amounts' => ['component' => 'a17-block-donation_amounts'],
        ],
        'crops' => [
            'image' => [
                'desktop' => [
                    [
                        'name' => 'desktop',
                        'ratio' => 16 / 9,
                        'minValues' => [
                            'width' => 100,
                            'height' => 100,
                        ],
                    ],
                ],
                'tablet' => [
                    [
                        'name' => 'tablet',
                        'ratio' => 4 / 3,
                        'minValues' => [
                            'width' => 100,
                            'height' => 100,
                        ],
                    ],
                ],
                'mobile' => [
                    [
                        'name' => 'mobile',
                        'ratio' => 1,
                        'minValues' => [
                            'width' => 100,
                            'height' => 100,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
