@twillBlockTitle('Tekst met afbeelding')
@twillBlockIcon('text')

@formField('wysiwyg', [
    'name' => 'text',
    'label' => 'Tekst',
    'placeholder' => 'Vul een tekst in',
    'maxlength' => 2500
])

@formField('medias', [
    'name' => 'image',
    'label' => 'Afbeelding'
])

@formField('select', [
    'name' => 'image-location',
    'required' => true,
    'label' => 'Afbeelding locatie',
    'options' => [
        [
            'value' => 'right',
            'label' => 'Rechts',
        ],
        [
            'value' => 'left',
            'label' => 'Links'
        ]
    ]
])
