@twillBlockIcon('location')
@twillBlockTitle('Locatie op de kaart')

@formField('input', [
    'name' => 'title',
    'type' => 'text',
    'label' => 'Voorbeeld: "Huidige locatie van het TinyRestaurant"',
    'maxlength' => 50
])

@formField('input', [
    'name' => 'address',
    'type' => 'text',
    'label' => 'Adres',
    'maxlength' => 250,
])