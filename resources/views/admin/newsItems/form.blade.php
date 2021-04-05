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

    @formField('browser', [
        'name' => 'links',
        'label' => 'linkable object',
        'max' => 10,
        'modules' => [
            [ 'label' => 'Pages', 'name' => 'pages' ],
            [ 'label' => 'Farmers', 'name' => 'farmers' ],
            [ 'label' => 'Municipalities', 'name' => 'municipalities' ],
        ]
    ])

    @formField('block_editor')
@stop
