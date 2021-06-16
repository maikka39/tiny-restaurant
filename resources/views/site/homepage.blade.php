@extends("site.layouts.base", [
    "title" => $homepage->title
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
@endpush

@section('content')
    <div id="video-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="video-container">
                <iframe allowfullscreen="1" width="100%" height="100%" id="homepage-video" src="{{$video_src}}"></iframe>
            </div>
        </div> 
        <button id="video-modal-close" class="modal-close is-large" aria-label="close"></button>
    </div>
    <!-- Hero -->
    <section class="hero is-fullheight-with-navbar">

        <div class="hero-body">
            <span class="watermark">ON TOUR</span>
            <div class="columns is-vcentered">
                <div class="left">
                    <h1 class="title is-size-1 has-text-weight-bold">{{ $homepage->title }}</h1>
                    <p class="subtitle is-size-3">{{ $homepage->slogan }}</p>
                    <a class="button is-primary" href="{{ $homepage->button_url }}">{{ $homepage->button_text }}</a>
                    <a id="video-modal-open" class="button is-primary"> Video </a>
                </div>
            
                <div class="right">
                    @foreach($homepage->imagesAsArrays('hero', 'flexible') as $image)
                        <figure class="image to-background">
                            <img class="hero-image" src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" draggable="false" />
                        </figure>
                    @endforeach
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
                    <a href="{{$highlight->url}}" target="_blank">
                        <div class="container is-flex-tablet is-justify-content-center is-flex-wrap-wrap">
                            <div class="is-flex is-align-items-center is-justify-content-center is-flex-wrap-wrap mb-5 grow">
                                <figure class="image is-64x64 mr-2">
                                        <img type="image/png" src="{{ asset('img/link_icons/'.$highlight->logo_url)}}" />
                                </figure>
                                <h1 class="has-text-black has-text-centered is-size-2">{{$highlight->name}}</h1>
                            </div>
                    </a>
                            <div class="container">
                                <div class="content">
                                    <p class="has-text-centered">{{ $highlight->pitch }}</p>
                                    <a href="{{$highlight->url}}" target="_blank">
                                        <p class="has-text-centered has-text-weight-semibold">Bekijk deze pagina</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="column is-1"></div>
                
                <div class="divider is-hidden-mobile is-vertical ml-0"></div>
                <div class="divider is-hidden-tablet"></div>

                
                <div class="column is-flex is-align-items-center">
                    <div class="container">
                        <h1 class="title is-4 has-text-centered">Bekijk de andere pagina's van het Tiny Restaurant!</h1>
                        <br>
                        <div class="columns is-mobile is-multiline px-6">
                           @foreach($homepage->homepage_link_items->where('position', '!=', 1)->sortBy('position') as $link)
                                <div class="column is-half-mobile px-0">
                                    <a href="{{$link->url}}" target="#">
                                        <div class="is-flex is-justify-content-center">
                                            <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center grow">
                                                <figure class="image is-64x64">
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
            <x-partners-slideshow />
        </div>
    </section>
    
    <!-- Partners -->
    <section class="section primary is-medium has-text-centered">
        <div class="container">
            <x-partners />
        </div>
    </section>
@endsection
