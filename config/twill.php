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
        'users-2fa' => true,
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
            ]
        ],
        'repeaters' => [
            'social_media_links_item' => [
                'title' => 'Social Media link',
                'trigger' => 'Nieuwe link toevoegen',
                'component' => 'a17-block-social_media_links_item'
            ]
        ]
    ]
];
