@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'label' => 'Facebook Page ID',
        'name' => 'facebook_page_id',
        'textLimit' => '256'
    ])

    @formField('input', [
        'label' => 'Facebook Access Token',
        'name' => 'facebook_access_token',
        'textLimit' => '256'
    ])
@stop