@formField('input', [
    'type' => 'text',
    'name' => 'link',
    'note' => 'Voorbeeld: "https://www.facebook.com/TinyRestaurant.nl/"',
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
            'label' => 'YouTube logo'
        ],
        [
            'value' => 'fab fa-facebook-messenger',
            'label' => 'Facebook Messenger logo'
        ],
        [
            'value' => 'fab fa-whatsapp',
            'label' => 'WhatsApp logo'
        ]
    ]
])