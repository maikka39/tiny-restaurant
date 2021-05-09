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