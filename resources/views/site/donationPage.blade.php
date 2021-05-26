@extends("site.layouts.base", [
    "title" => $donationPage->title
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/donationPage.css') }}">
@endpush

@section('content')
    <!-- Hero -->
    <section class="hero is-fullheight-with-navbar">
        @php
            $image = $donationPage->image('hero', 'flexible');
            $alt = $donationPage->imageAltText('hero');
        @endphp

        <div class="hero-body">
            <div class="columns is-vcentered">
                <div class="left">
                    <h1 class="title is-size-1 has-text-weight-bold">{{ $donationPage->title }}</h1>
                    <p class="subtitle is-size-3">{{ $donationPage->slogan }}</p>
                </div>
            
                <div class="right">
                    <figure class="image to-background">
                        <img class="hero-image" src="{{ $image }}" alt="{{ $alt }}" draggable="false" />
                    </figure>
                </div>
            </div>
        </div>
    </section>
@endsection
