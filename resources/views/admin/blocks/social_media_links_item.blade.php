@formField('color', [
    'name' => 'logo_color',
    'label' => 'Logo kleur'
])

@formField('input', [
    'type' => 'text',
    'name' => 'link',
    'note' => 'Voorbeeld: "https://nl-nl.facebook.com/"',
    'label' => 'Volledige link',
])

@formField('select', [
    'name' => 'logo',
    'label' => 'Logo',
    'placeholder' => 'Selecteer een logo',
    'options' => [
        [
            'value' => 'fab fa-facebook-square',
            'label' => 'Facebook logo'
        ],
        [
            'value' => 'fas fa-at',
            'label' => 'Email logo'
        ],
        [
            'value' => 'fas fa-phone',
            'label' => 'Telefoon logo'
        ],
        [
            'value' => 'fab fa-instagram',
            'label' => 'Instagram logo'
        ],
        [
            'value' => 'fab fa-snapchat',
            'label' => 'Snapchat logo'
        ],
        [
            'value' => 'fab fa-linkedin',
            'label' => 'LinkedIn logo'
        ],
        [
            'value' => 'fab fa-twitch',
            'label' => 'Twitch logo'
        ],
        [
            'value' => 'fab fa-youtube',
            'label' => 'Youtube logo'
        ],
        [
            'value' => 'fab fa-facebook-messenger',
            'label' => 'Facebook Messenger logo'
        ],
        [
            'value' => 'fab fa-whatsapp',
            'label' => 'Whatsapp logo'
        ]
    ]
])