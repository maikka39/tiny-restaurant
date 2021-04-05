@extends('twill::layouts.form')

@php
    $enableSourceCode = config('app.env') == 'production' ? false : true
@endphp

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description',
        'toolbarOptions' => [
            [ 'header' => [2,3,4, false] ],
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

    @formField('medias', [
        'label' => 'Afbeeldingen',
        'name' => 'cover',
        'note' => 'Voeg afbeeldingen aan je bericht toe',
        'max' => 10,
        'with_multiple' => true
    ])

    @formField('files', [
        'label' => 'Bestanden',
        'name' => 'fakjls',
        'note' => 'Voeg bestanden aan je bericht toe',
        'fieldNote' => 'Voeg hier mp3/mp4/pdf bestanden toe',
    ])

    @formField('block_editor')
@stop
