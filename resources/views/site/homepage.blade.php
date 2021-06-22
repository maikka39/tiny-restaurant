@extends("site.layouts.base", [
"page" => $homepage,
"title" => $homepage->title,
"description" => $homepage->slogan,
"image" => $homepage->imageAsArray('hero', 'desktop'),
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/home.js') }}" defer></script>
@endpush

@section('content')
    <div id="video-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="video-container">
                {!! $video !!}
            </div>
        </div>
        <button id="video-modal-close" class="modal-close is-large" aria-label="close"></button>
    </div>
    <!-- Hero -->
    <section class="hero is-fullheight-with-navbar">

        <div class="hero-body">
            <span class="watermark" aria-hidden="true">ON TOUR</span>
            <div class="columns is-vcentered">
                <div class="left">
                    <h1 class="title is-size-1 has-text-weight-bold">{{ $homepage->title }}</h1>
                    <p class="subtitle is-size-3">{{ $homepage->slogan }}</p>
                    <a class="button is-primary" href="{{ $homepage->button_url }}">{{ $homepage->button_text }}</a>
                    @if ($video != null)
                        <a id="video-modal-open" class="button is-primary"><i class="far fa-play-circle mr-1"></i>Bekijk de
                            video!</a>
                    @endif
                </div>

                <div class="right" aria-hidden="true">
                    <figure class="image to-background" data-slideshow>
                        @foreach (array_reverse($homepage->imagesAsArrays('hero', 'flexible')) as $image)
                            <img class="hero-image" src="{{ $image['src'] }}" alt="" draggable="false" />
                        @endforeach
                    </figure>
                </div>
            </div>
            <a class="scroll-down-indicator" id="scroll-down-indicator" href="#scroll-down-indicator" tabindex="-1"
                aria-hidden="true"></a>
        </div>
    </section>

    <!-- Social media -->
    <section class="section primary">
        <div class="hero-body">
            <div class="columns is-tablet">
                <div class="column is-one-third-tablet">
                    <a href="{{ $highlight->url }}" target="_blank">
                        <div class="container is-flex-tablet is-justify-content-center is-flex-wrap-wrap">
                            <div
                                class="is-flex is-align-items-center is-justify-content-center is-flex-wrap-wrap mb-5 grow">
                                <figure class="image is-64x64 mr-2">
                                    <img src="{{ asset('img/link_icons/' . $highlight->logo_url) }}" alt="" />
                                </figure>
                                <h1 class="has-text-black has-text-centered is-size-2">{{ $highlight->name }}</h1>
                            </div>
                        </div>
                    </a>
                    <div class="container">
                        <div class="content">
                            <p class="has-text-centered">{{ $highlight->pitch }}</p>
                            <a href="{{ $highlight->url }}" target="_blank">
                                <p class="has-text-centered has-text-weight-semibold">Bekijk deze pagina</p>
                            </a>
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
                            @foreach ($homepage->homepage_link_items->where('position', '!=', 1)->sortBy('position') as $link)
                                <div class="column is-half-mobile px-0">
                                    <a href="{{ $link->url }}" target="_blank">
                                        <div class="is-flex is-justify-content-center">
                                            <div
                                                class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center grow">
                                                <figure class="image is-64x64">
                                                    <img src="{{ asset('img/link_icons/' . $link->logo_url) }}" alt="" />
                                                </figure>
                                                <p class="has-text-weight-medium has-text-centered">{{ $link->name }}</p>
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
