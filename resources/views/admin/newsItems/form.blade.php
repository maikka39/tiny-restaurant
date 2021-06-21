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
@stop

@section('sideFieldsets')
    <a17-fieldset title="Facebook" id="options">
        @formField('checkbox', [
            'label' => 'Dit bericht op facebook plaatsen',
            'name' => 'post_to_facebook'
        ])
    </a17-fieldset>
@endsection
