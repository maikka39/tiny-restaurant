@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'title',
        'label' => 'Titel',
        'maxlength' => 40
    ])

    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Beschrijving',
        'maxlength' => 2500,
    ])

    @formField('medias', [
        'type' => 'image',
        'name' => 'hero',
        'label' => 'Afbeelding'
    ])
@endsection


@section('fieldsets')
    <a17-fieldset title="Instellingen" id="settings" :open="true">
        @formField('input', [
            'name' => 'mollie_api_key',
            'label' => 'Mollie API sleutel',
            'maxlength' => 40,
        ])
    </a17-fieldset>


    <a17-fieldset title="Bedragen" id="amounts" :open="true">
        @formField('repeater', ['type' => 'donation_amounts'])
    </a17-fieldset>
@endsection

@section('sideFieldsets')
    <a17-fieldset title="Zoekmachineoptimalisatie" id="options">
        @formField('input', [
            'label' => 'Trefwoorden',
            'name' => 'keywords',
            'note' => 'Scheid de verschillende trefwoorden met een spatie.',
            'placeholder' => 'Scheid de verschillende trefwoorden met een spatie.',
        ])
    </a17-fieldset>
@endsection
