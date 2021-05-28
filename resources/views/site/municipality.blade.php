@extends("site.layouts.base", [
    "title" => $municipality->title
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/municipality.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/carrousel.js') }}" defer></script>
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
        <div class="info">
            <h2>De boeren van {{ $municipality->title }}</h2>
            <p>Lees het verhaal van de boeren in gemeente {{ $municipality->title }}</p>
            <hr>
            <iframe src="https://maps.google.com/maps?q={{ $municipality->title }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>
        <div class="farmers">
            <div class="container">
                <div class="carousel" id="municipality-carousel">
                    @foreach($municipality->farmers as $farmer)
                        <div class="column item-{{ $loop->iteration }}">
                            <div class="card farmer-card">
                                @php($image = $farmer->imageAsArray('farmer_profile', 'flexible'))
                                @if ($image)
                                    <div class="card-image">
                                        <figure class="image is-3by2">
                                            <img class="project-image" src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
                                        </figure>
                                    </div>
                                @endif

                                <div class="card-content">
                                    <p class="title is-4">{{ $farmer->name }}</p>
                                    <div class="content">{{ $farmer->summary }}</div>
                                    <a class="button is-primary" href="{{ route('farmer.show', $farmer->slug) }}">Lees meer</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection