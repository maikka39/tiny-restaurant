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

    'locale' => 'nl',
    'fallback_locale' => 'en',
    'block_editor' => [
        'block_preview_render_childs' => false, // indicates if childs should be rendered when using repeater in blocks
        'blocks' => [
            'social_media_links' => [
                'title' => 'Social Media Links',
                'icon' => 'text',
                'component' => 'a17-block-social_media_links'
            ],
            'contact_link' => [
                'title' => 'Contact Link',
                'icon' => 'text',
                'component' => 'a17-block-contact_link'
            ],
            'contact_form' => 'a17-block-contact_form',
            'location_map' => 'a17-block-location_map',
        ],
        'repeaters' => [
            'social_media_links_item' => [
                'title' => 'Social Media link',
                'trigger' => 'Nieuwe link toevoegen',
                'component' => 'a17-block-social_media_links_item'
            ]
            ,
            'farmers_item' => [
                'title' => 'Boer',
                'trigger' => 'Nieuwe boer toevoegen',
                'component' => 'a17-block-boer_item'
            ]
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
