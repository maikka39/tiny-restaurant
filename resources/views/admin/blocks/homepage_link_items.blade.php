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
            'value' => 'facebook.png'
        ],
        [
            'label' => 'Instagram',
            'value' => 'instagram.png'
        ],
        [
            'label' => 'Youtube',
            'value' => 'youtube.png'
        ],
        [
            'label' => 'Pinterest',
            'value' => 'pinterest.png'
        ],
        [
            'label' => 'Twitch',
            'value' => 'twitch.png'
        ],
        [
            'label' => 'Twitter',
            'value' => 'twitter.png'
        ],
        [
            'label' => 'Alternatief',
            'value' => 'share.png'
        ]
    ]
])

@formField('input', [
    'name' => 'pitch',
    'label' => 'Pitch (optioneel)',
    'placeholder' => 'Wordt afgebeeld wanneer de link highlighted is.',
    'maxlength' => 300
])
