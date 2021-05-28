@extends("site.layouts.base", [
    "title" => $municipality->title
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/municipality.css') }}">
@endpush

@section("content")
    <section class="section section-municipality-hero">
        <div class="municipality-text">
            <h2 class="municipality-title">{{ $municipality->title }}</h2>
            <p class="municipality-description">{{ $municipality->description }}</p>
        </div>
        @php($image = $municipality->imageAsArray('municipality_picture', 'flexible'))
        <img class="municipality-image" src="{{ $image ? $image['src'] : asset('img/house-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'municipality placeholder' }}">
    </section>
    <section class="section section-farmers">
        <div>
            <h2>De boeren van {{ $municipality->title }}</h2>
            <p>Lees het verhaal van de boeren in gemeente {{ $municipality->title }}</p>
            <hr>
            <iframe src="https://maps.google.com/maps?q={{ $item->title }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>
        <div class="carousel">
            //hier komen de boeren
        </div>
    </section>
@endsection