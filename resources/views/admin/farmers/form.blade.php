@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'description',
        'label' => 'Beschrijving',
        'maxlength' => 100
    ])

    @formField('input', [
        'name' => 'address',
        'label' => 'Adres',
    ])

    @formField('medias', [
        'name' => 'farmer_profile',
        'label' => 'Profiel foto',
        'fieldNote' => 'Een mooie afbeelding van de boer of de boerderij',
    ])

    @formField('block_editor', [
        'blocks' => ['social_media_links']
    ])
@stop
