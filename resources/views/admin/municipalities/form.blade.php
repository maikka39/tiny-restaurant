@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'description',
        'label' => 'Beschrijving',
        'maxlength' => 100
    ])
    @formField('medias', [
        'name' => 'municipality_picture',
        'label' => 'Gemeente Afbeelding'
    ])
@stop
