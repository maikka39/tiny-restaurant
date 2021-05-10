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
@stop

@section('fieldsets')
    <a17-fieldset title="Links" id="links" :open="true">
        @formField('repeater', ['type' => 'homepage_link_items'])
    </a17-fieldset>

    <a17-fieldset title="Partners" id="partners" :open="true">
        @formField('repeater', ['type' => 'partner_items'])
    </a17-fieldset>
@endsection
