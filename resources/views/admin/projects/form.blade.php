@extends('twill::layouts.form')

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Beschrijving',
        'placeholder' => 'Vul hier een beschrijving in voor het project.',
        'maxlength' => 2500
    ])

    @formField('checkbox', [
        'name' => 'active',
        'label' => 'Actief project'
    ])

    @formField('input', [
        'name' => 'address',
        'label' => 'Adres'
    ])

    @formField('date_picker', [
        'name' => 'date',
        'label' => 'Datum en Tijd'
    ])

    @formField('browser', [
        'name' => 'municipalities',
        'label' => 'Gemeentes',
        'max' => 20,
        'moduleName' => 'municipalities',
    ])

    @formField('browser', [
        'name' => 'farmers',
        'label' => 'Boeren',
        'max' => 300,
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
