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
        'block_single_layout' => 'layouts.block', // layout to use when rendering a single block in the editor
        'block_views_path' => 'site.blocks', // path where a view file per block type is stored
        'block_views_mappings' => [], // custom mapping of block types and views
        'block_preview_render_childs' => true, // indicates if childs should be rendered when using repeater in blocks
        'block_presenter_path' => null, // allow to set a custom presenter to a block model
        // Indicates if blocks templates should be inlined in HTML.
        // When setting to false, make sure to build Twill with your all your custom blocks using php artisan twill:build.
        'inline_blocks_templates' => true,
        'custom_vue_blocks_resource_path' => 'assets/js/blocks', // path to custom vue blocks in your resources directory
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
        'repeaters' => [],
    ]
];
