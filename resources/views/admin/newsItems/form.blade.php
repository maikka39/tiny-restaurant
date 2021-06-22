@extends('twill::layouts.form')

@php
    $enableSourceCode = config('app.env') == 'production' ? false : true
@endphp

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description',
        'toolbarOptions' => [
            [ 'header' => [3,4,5, false] ],
            'list-ordered',
            'list-unordered',
            'bold',
            'italic',
            'underline',
            'clean',
            'blockquote',
            'link'
        ],
        'editSource' => $enableSourceCode
    ])

    @formField('input', [
        'name' => 'summary',
        'label' => 'Samenvatting',
        'maxlength' => 250,
        'required' => true,
        'note' => 'Vat kort de inhoud van het nieuwsbericht samen.',
        'type' => 'textarea',
        'rows' => 3
    ])

    @formField('medias', [
        'label' => 'Afbeeldingen',
        'name' => 'cover',
        'note' => 'Voeg afbeeldingen aan je bericht toe',
        'max' => 10,
        'with_multiple' => true,
        'buttonOnTop' => true,
    ])

    @formField('files', [
        'label' => 'Bestanden',
        'name' => 'attachments',
        'note' => 'Voeg bestanden aan je bericht toe',
        'fieldNote' => 'Voeg hier mp3/mp4/pdf bestanden toe',
        'max' => 4,
        'buttonOnTop' => true,
    ])

    @formField('block_editor')
@endsection

@section('sideFieldsets')
    <a17-fieldset title="Zoekmachineoptimalisatie" id="options">
        @formField('input', [
            'label' => 'Categorie',
            'name' => 'category',
            'note' => 'Kies een algemene categorie.',
            'placeholder' => 'Kies een algemene categorie.',
        ])
        @formField('input', [
            'label' => 'Trefwoorden',
            'name' => 'keywords',
            'note' => 'Scheid de verschillende trefwoorden met een spatie.',
            'placeholder' => 'Scheid de verschillende trefwoorden met een spatie.',
        ])
    </a17-fieldset>
@endsection
