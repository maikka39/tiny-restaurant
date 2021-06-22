@extends('twill::layouts.form', [
    'sideFieldsetLabel' => 'Pagina-instellingen'
])

@section('contentFields')
    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description'
    ])

    @formField('block_editor')
@endsection

@section('sideFieldset')
    @formField('medias', [
        'name' => 'featured',
        'label' => 'Uitgelichte afbeelding'
    ])
@endsection

@section('sideFieldsets')
    <a17-fieldset title="Zoekmachineoptimalisatie" id="options">
        @formField('input', [
            'label' => 'Categorie',
            'name' => 'category',
            'note' => 'Kies een algemene categorie.',
            'placeholder' => 'Kies een algemene categorie.',
        ])
        @formField('input', [
            'label' => 'Trefwoorden',
            'name' => 'keywords',
            'note' => 'Scheid de verschillende trefwoorden met een spatie.',
            'placeholder' => 'Scheid de verschillende trefwoorden met een spatie.',
        ])
    </a17-fieldset>
@endsection
