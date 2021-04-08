@twillBlockTitle('Partner')
@twillBlockTrigger('Nieuwe partner toevoegen')

@formField('input', [
    'type' => 'text',
    'name' => 'name',
    'label' => 'Naam'
])

@formField('medias', [
    'type' => 'image',
    'name' => 'image',
    'label' => 'Afbeelding',
])

@formField('wysiwyg', [
    'name' => 'description',
    'label' => 'Beschrijving',
])

{{-- @formField('input', [
    'type' => 'text',
    'name' => 'description',
    'label' => 'Beschrijving',
]) --}}
