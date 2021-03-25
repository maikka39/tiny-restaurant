@extends('twill::layouts.form')

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description',
        'placeholder' => 'Vul hier een beschrijving in voor het project.'
        'maxlength' => 500
    ])

    @formField('input', [
        'name' => 'address',
        'label' => 'Adres'
    ])

    @formField('medias', [
        'name' => 'project_image',
        'label' => 'Afbeelding',
        'fieldNote' => 'Een afbeelding voor op de pagina van het project'
    ])

    @formField('block_editor', [
        'blocks' => ['social_media_links']
    ])
@stop
