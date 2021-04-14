<?
@extends('twill::layouts.settings')

@section('contentFields')
    @formField('medias', [
        'name' => 'banner_image',
        'label' => 'Banner afbeelding'
    ])

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

    @formField('wysiwyg', [
        'name' => 'body_text',
        'label' => 'Body tekst',
        'placeholder' => 'Vul een tekst in',
        'maxlength' => 2500
    ])

    @formField('medias', [
        'name' => 'body_image',
        'label' => 'Body afbeelding'
    ])

@stop