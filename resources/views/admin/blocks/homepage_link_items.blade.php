@twillBlockIcon('website')
@twillBlockTitle('Link')
@twillBlockTrigger('Nieuwe link toevoegen')

@formField('input', [
    'name' => 'name',
    'type' => 'text',
    'note' => 'Voorbeeld: "Voorbeeld"',
    'label' => 'Naam',
])

@formField('input', [
    'name' => 'url',
    'type' => 'text',
    'note' => 'Voorbeeld: "http://example.com/"',
    'label' => 'Volledige link',
])

@formField('select', [
    'name' => 'logo_url',
    'label' => 'Logo',
    'options' => [
        [
            'label' => 'Facebook',
            'value' => 'Facebook.png'
        ],
        [
            'label' => 'Instagram',
            'value' => 'Instagram.png'
        ],
        [
            'label' => 'Youtube',
            'value' => 'Youtube.png'
        ],
        [
            'label' => 'Pinterest',
            'value' => 'Pinterest.png'
        ],
        [
            'label' => 'Twitch',
            'value' => 'twitch.png'
        ],
        [
            'label' => 'Twitter',
            'value' => 'Twitter.png'
        ],
        [
            'label' => 'Alternatief',
            'value' => 'Share.png'
        ]
    ]
])