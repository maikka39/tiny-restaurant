@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'description',
        'label' => 'Beschrijving',
        'maxlength' => 100
    ])

    @formField('input', [
        'name' => 'address',
        'label' => 'Adres',
    ])

    @formField('medias', [
        'name' => 'farmer_profile',
        'label' => 'Profiel foto',
    ])
@stop
