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
            <span class="watermark">ON TOUR</span>
            <div class="columns is-vcentered">
                <div class="left">
                    <h1 class="title is-size-1 has-text-weight-bold">{{ $homepage->title }}</h1>
                    <p class="subtitle is-size-3">{{ $homepage->slogan }}</p>
                    <a class="button is-primary" href="{{ $homepage->button_url }}">{{ $homepage->button_text }}</a>
                </div>
            </div>
            <div>
                <div class="right">
                    <figure class="image">
                        <img class="hero-image" src="{{ $image }}" alt="{{ $alt }}" draggable="false" />
                    </figure>
                </div>
            </div>
            <a class="scroll-down-indicator" id="scroll-down-indicator" href="#scroll-down-indicator"></a>
        </div>
    </section>
    
    <!-- Social media -->
    <section class="section primary">
        <div class="hero-body">
            <div class="columns is-tablet">
                <div class="column is-one-third-tablet">
                    <a href="{{$highlight->url}}" target="#">
                        <div class="container is-flex-tablet is-justify-content-center is-flex-wrap-wrap">
                            <div class="is-flex is-align-items-center is-justify-content-center is-flex-wrap-wrap mb-4 grow">
                                <figure class="image is-64x64 mr-2">
                                        <img type="image/png" src="{{ asset('img/link_icons/'.$highlight->logo_url)}}" />
                                </figure>
                                <h1 class="has-text-centered is-size-2">{{$highlight->name}}</h1>
                            </div>

                            <br>
                            <div class="container">
                                <div class="content">
                                    <p class="has-text-centered">{{ $highlight->pitch }}</p>
                                    <p class="has-text-centered has-text-weight-semibold">Bekijk deze pagina</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="divider is-vertical"></div>
                <hr class="is-mobile">
                <div class="column">
                    <div class="container">
                        <h1 class="title is-4 has-text-centered">Bekijk de andere pagina's van het Tiny Restaurant!</h1>
                        <br>
                        <div class="columns is-mobile is-multiline">
                           @foreach($homepage->homepage_link_items->where('position', '!=', 1)->all() as $link)
                                <div class="column is-half-mobile">
                                    <a href="{{$link->url}}" target="#">
                                        <div class="is-flex is-justify-content-center is-flex-wrap-wrap">
                                            <div class="block grow">
                                                <figure class="image is-64x64 mb-1">
                                                    <img type="image/png" src="{{ asset('img/link_icons/'.$link->logo_url) }}" />
                                                </figure>
                                                <p class="has-text-weight-medium has-text-centered">{{$link->name}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach 
                        </div>
                    </div>
                </div>
            </div>
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
