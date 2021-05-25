@extends('site.layouts.base', [
    'title' => $item->title
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/farmer.css') }}">
@endpush

@section('content')
    <section class="section section-farmer-hero">
        <div class="is-flex hero-content">
            @php($image = $item->imageAsArray('farmer_profile', 'flexible'))
            <img class="farmer-hero-image" src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
            <div class="farmer-hero-text">
                <h2 class="mb-4">{{ $item->name }}</h2>
                <p>{{ $item->summary }}</p>
                <hr class="divider">
                <small>{{ $item->name }} is al {{ $item->getJoinedTime() }} dagen lid by het Tiny Restaurant!</small>
            </div>
        </div>
    </section>
    <section class="section story">
        <h3 class="story-header">Lees het hele verhaal van {{ $item->name }}</h3>
        <div class="story-body">{!! $item->description !!}</div>
    </section>
    <section class="section section-farmer-gallery">
        <h3 class="gallery-header">De fotogalerij</h3>
        <p class="gallery-text">Bekijk de foto's van {{ $item->name }}</p>
        <div class="gallery">
            @foreach($item->imagesAsArrays('farmer_profile', 'flexible') as $image)
                <img class="farmer-hero-image" src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
            @endforeach
        </div>
    </section>
@endsection
