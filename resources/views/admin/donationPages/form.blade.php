@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'title',
        'label' => 'Titel',
        'maxlength' => 20
    ])

    @formField('input', [
        'name' => 'description',
        'label' => 'Beschrijving',
        'maxlength' => 100
    ])

    @formField('medias', [
        'type' => 'image',
        'name' => 'hero',
        'label' => 'Afbeelding'
    ])
@endsection


@section('fieldsets')
    <a17-fieldset title="Bedragen" id="amounts" :open="true">
        @formField('repeater', ['type' => 'donation_amounts'])
    </a17-fieldset>
@endsection