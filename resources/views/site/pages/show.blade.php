@extends('site.layouts.base', [
    'title' => $item->title,
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom_page.css') }}">
@endpush

@section('content')
    <section class="hero news-hero">
        <div class="hero-body">
            <h1 class="is-size-1 has-text-centered has-text-weight-bold mt-2">{{ $item->title }}</h1>
            <h3 class="is-size-3-desktop is-size-4-tablet is-size-5-mobile has-text-centered mt-4 mb-5">{!! $item->description !!}</h3>
        </div>
        <figure class="image">
            @php($image = $item->image('featured', 'desktop'))
            <img src="{{ $image ?? "" }}" alt="Hero achtergrond foto" />
        </figure>
    </section>
    <section class="section">
        {!! $item->renderBlocks(false) !!}
    </section>
@endsection
