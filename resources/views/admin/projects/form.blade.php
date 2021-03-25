@extends('twill::layouts.form')

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description',
        'placeholder' => 'Vul hier een beschrijving in voor het project.',
        'maxlength' => 500
    ])

    @formField('input', [
        'name' => 'address',
        'label' => 'Adres'
    ])

    @formField('browser', [
        'name' => 'municipalities',
        'label' => 'Gemeentes',
        'max' => 5,
        'moduleName' => 'municipalities',
    ])

    @formField('browser', [
        'name' => 'farmers',
        'label' => 'Boeren',
        'max' => 5,
        'moduleName' => 'farmers',
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
