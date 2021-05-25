@extends("site.layouts.base", [
    "title" => $homepage->title
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')   
    <!-- Hero -->
    <section class="hero is-fullheight-with-navbar">
        @php
            $image = $homepage->image('hero', 'flexible');
            $alt = $homepage->imageAltText('hero');
        @endphp

        <div class="hero-body">
            <span class="watermark">ONZE BOEREN</span>
            <div class="columns is-vcentered is-desktop">
                <div class="left">
                    <h1 class="title is-size-1 has-text-weight-bold">{{ $homepage->title }}</h1>
                    <p class="subtitle is-size-3">{{ $homepage->slogan }}</p>
                    <a class="button is-primary" href="{{ route('project.showAll') }}">Projecten</a>
                </div>
    
                <div class="right">
                    <figure class="image">
                        <img class="hero-image" src="{{ $image }}" alt="{{ $alt }}" />
                    </figure>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Social media -->
    <section class="section primary is-medium has-text-centered">
        <div class="container">
            <p>Social media hier</p>
        </div>
    </section>
    
    <!-- Latest news -->
    <section class="section">
        <div class="container">
            <x-latest-news />
        </div>
    </section>
    
    <!-- Projects -->
    <section class="section secondary">
        <div class="container">
            <x-projects />
        </div>
    </section>
    
    <!-- Partner slideshow -->
    <section class="section has-text-centered">
        <div class="container">
            <p>Slideshow hier</p>
        </div>
    </section>
    
    <!-- Partners -->
    <section class="section primary is-medium has-text-centered">
        <div class="container">
            <x-partners />
        </div>
    </section>
@endsection
