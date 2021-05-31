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
            <div class="map">
                <iframe src="https://maps.google.com/maps?q={{ $municipality->title }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
        </div>
        <div class="farmers">
            <div class="container">
                <div class="carousel" id="municipality-carousel">
                    @foreach($municipality->farmers as $farmer)
                        <div class="column item-{{ $loop->iteration }}">
                            <div class="card farmer-card item-{{ $loop->iteration }}">
                                @php($image = $farmer->imageAsArray('farmer_profile', 'flexible'))
                                @if ($image)
                                    <div class="card-image">
                                        <figure class="image">
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
                        {{-- There's a bug with the carousel: with 1 item the carrousel crashes, so I add an empty span --}}
                        @if(count($municipality->farmers) == 1)<span></span>@endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section section-projects">

            <div class="block">
                <h2 class="title is-size-1 is-size-3-mobile has-text-weight-normal">Aanstaande projecten</h2>
                <p class="subtitle is-size-3 is-size-5-mobile mt-5">Hier is een korte agenda om te zien wat de aankomende projecten van de gemeente {{ $municipality->title }}.</p>
                <a href="{{ route('project.showAll', ['search' => $municipality->title]) }}" class="button is-primary">Bekijk alle projecten</a>
            </div>

            <div class="columns">
                @forelse($projects as $project)

                    <div class="column">
                        <div class="card project-card">
                            <div class="card-image">
                                <figure class="image is-3by2">
                                    @php($image = $project->imageAsArray('project_image', 'flexible'))
                                    <img class="project-image" src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
                                </figure>
                            </div>

                            <div class="card-content">
                                <p class="title is-4">{{ $project->name }}</p>
                                <p class="subtitle is-6">
                                    {{ $project->date->format('d-m-Y') }}
                                </p>

                                <div class="content">{!! $project->description !!}</div>

                                <a href="{{ route('project.show', $project->slug) }}">Lees meer</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="column">
                        <p>Er zijn geen projecten!</p>
                    </div>
                @endforelse
            </div>
    </section>
@endsection