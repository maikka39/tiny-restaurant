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
    <a17-fieldset title="Uitgelichte Link" id="mainlink" :open="true">
        @formField('input', [
            'name' => 'highlight_link_name',
            'type' => 'text',
            'note' => 'Voorbeeld: "Voorbeeld"',
            'label' => 'Naam',
            'maxlength' => 20,
        ])

        @formField('input', [
            'name' => 'highlight_link_url',
            'type' => 'text',
            'note' => 'Voorbeeld: "http://example.com/"',
            'label' => 'Volledige link',
            'maxlength' => 150
        ])

        @formField('select', [
            'name' => 'highlight_link_logo_url',
            'label' => 'Logo',
            'options' => [
                [
                    'label' => 'Facebook',
                    'value' => 'Facebook.png'
                ],
                [
                    'label' => 'Instagram',
                    'value' => 'Instagram.png'
                ],
                [
                    'label' => 'Youtube',
                    'value' => 'Youtube.png'
                ],
                [
                    'label' => 'Pinterest',
                    'value' => 'Pinterest.png'
                ],
                [
                    'label' => 'Twitch',
                    'value' => 'twitch.png'
                ],
                [
                    'label' => 'Twitter',
                    'value' => 'Twitter.png'
                ],
                [
                    'label' => 'Alternatief',
                    'value' => 'Share.png'
                ]
            ]
        ])
    </a17-fieldset>

    <a17-fieldset title="Extra Links" id="links" :open="true">
        @formField('repeater', ['type' => 'homepage_link_items'])
    </a17-fieldset>

    <a17-fieldset title="Partners" id="partners" :open="true">
        @formField('repeater', ['type' => 'partner_items'])
    </a17-fieldset>
@endsection
