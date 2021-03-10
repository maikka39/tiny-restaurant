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
        ]
    ]
])