@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'title',
        'label' => 'Titel',
        'maxlength' => 20
    ])

    @formField('input', [
        'name' => 'slogan',
        'label' => 'Slogan',
        'maxlength' => 100
    ])

    @formField('medias', [
        'type' => 'image',
        'name' => 'hero',
        'label' => 'Afbeelding'
    ])

    @formField('input', [
        'name' => 'button_text',
        'label' => 'Knoptekst',
        'maxlength' => 50,
        'default' => 'Projecten',
        'placeholder' => 'Projecten',
        'note' => 'Maak de tekst niet te lang!'
    ])

    @formField('input', [
        'name' => 'button_url',
        'label' => 'Knop-url',
        'defaullt' => '/projecten',
        'placeholder' => '/projecten',
        'note' => 'Mag een interne of externe URL zijn'
    ])
@endsection

@section('fieldsets')
    <a17-fieldset title="Links" id="links" :open="true">
        @formField('repeater', ['type' => 'homepage_link_items'])
    </a17-fieldset>

    <a17-fieldset title="Partners" id="partners" :open="true">
        @formField('repeater', ['type' => 'partner_items'])
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
