@twillBlockIcon('website')
@twillBlockTitle('Contact Formulier')

@formField('input', [
    'name' => 'title',
    'type' => 'text',
    'label' => 'Formulier titel',
    'maxlength' => 50
])

@formField('input', [
    'name' => 'description',
    'type' => 'textarea',
    'label' => 'Toelichting',
    'maxlength' => 250,
    'rows' => 4
])