@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'name' => 'banner_title',
        'type' => 'text',
        'label' => 'Banner title',
        'maxlength' => 50
    ])

    @formField('input', [
        'name' => 'banner_description',
        'type' => 'text',
        'label' => 'Banner description',
        'maxlength' => 50
    ])
@stop