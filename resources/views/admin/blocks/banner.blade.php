<?
@twillBlockTitle('Banner')
@twillBlockIcon('text')

@formField('medias', [
    'name' => 'image',
    'label' => 'Banner afbeelding'
])

@formField('input', [
    'name' => 'description',
    'type' => 'text',
    'label' => 'Banner text',
    'maxlength' => 50
])