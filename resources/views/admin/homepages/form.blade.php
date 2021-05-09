@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'title',
        'label' => 'Titel',
        'maxlength' => 20
    ])

    @formField('input', [
        'name' => 'banner',
        'label' => 'Banner',
        'maxlength' => 100
    ])

    @formField('repeater', ['type' => 'homepage_link_items'])
@stop
