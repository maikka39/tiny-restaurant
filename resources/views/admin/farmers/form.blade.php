@extends('twill::layouts.form')

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Beschrijving',
        'placeholder' => 'Vul een beschrijving in voor de boer',
        'maxlength' => 500
    ])


    @formField('input', [
        'name' => 'summary',
        'label' => 'Samenvatting',
        'maxlength' => 255,
        'required' => true,
        'note' => 'Maak een samenvatting voor de boer',
        'placeholder' => 'Voer een samenvatting in...',
        'type' => 'textarea',
        'rows' => 3
    ])

    @formField('input', [
        'name' => 'address',
        'label' => 'Adres',
    ])

    @formField('select', [
        'name' => 'municipality_id',
        'label' => 'Gemeente',
        'placeholder' => 'Selecteer een gemeente',
        'options' => $municipalities
    ])


    @formField('medias', [
        'name' => 'farmer_profile',
        'max' => 10,
        'label' => 'Profiel foto',
        'fieldNote' => 'Een mooie afbeelding van de boer of de boerderij',
    ])

    @formField('block_editor', [
        'blocks' => ['social_media_links']
    ])
@stop
