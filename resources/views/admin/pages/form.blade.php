@extends('twill::layouts.form', [
    'sideFieldsetLabel' => 'Pagina-instellingen'
])

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description'
    ])

    @formField('block_editor')
@stop

@section('sideFieldset')
    @formField('medias', [
        'name' => 'featured',
        'label' => 'Uitgelichte afbeelding'
    ])
@stop
