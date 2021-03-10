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
        'blocks' => [
            'social_media_links' => [
                'title' => 'Social Media Links',
                'icon' => 'text',
                'component' => 'a17-block-social_media_links'
            ],
            'contact_form' => 'a17-block-contact_form'
        ]
    ]
];
