@extends('twill::layouts.form')

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description'
    ])

    @formField('block_editor', [
        'blocks' => ['text', 'image']
    ])
@stop
