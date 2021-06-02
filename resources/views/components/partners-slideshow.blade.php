@push('scripts')
    <script type="text/javascript" src="{{ asset('js/carousel.js') }}" defer></script>
@endpush

<div class="partners-slideshow navigation-wrapper">
    <div class="carousel keen-slider">
        @foreach($partners as $partner)
            <div class="keen-slider__slide number-slide{{ $loop->iteration }}">
                <div class="card">
                    @php
                        $image = $partner->image('image', 'desktop');
                        $alt = $partner->imageAltText('image');
                    @endphp
                    <div class="card-content">
                        <h2 class="title is-2 has-text-weight-normal section-title">Uitgelichte partner</h2>
                        <figure class="image">
                            <img src="{{ $image }}" alt="{{ $alt }}">
                        </figure>
                        <div class="info-container">
                            <div class="info">
                                <h3 class="title is-4 mb-3">{{ $partner->name }}</h3>
                                <div class="content">{!! $partner->description !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button id="arrow-left" class="arrow arrow-left" aria-label="Vorige partner">
        <i class="fa fa-chevron-left fa-4x"></i>
    </button>
    <button id="arrow-right" class="arrow arrow-right" aria-label="Volgende partner">
        <i class="fa fa-chevron-right fa-4x"></i>
    </button>
    <div id="dots" class="dots"></div>
</div>
