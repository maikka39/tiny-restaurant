@extends("site.layouts.base", [
    "page" => $item,
    "title" => $item->name,
    "description" => $item->description,
    "image" => $item->imageAsArray('project_image', 'desktop'),
    "pagetype" => "article",
    'pagecreatedtime' => $item->created_at->format('c'),
    'pagemodifiedtime' => Carbon\Carbon::parse($item->updated_at)->format('c'),
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/project_individual.css') }}">
@endpush

@section('content')
    <section class="section section-project-hero">
        <div class="is-flex hero-content">
            <div class="hero-content-info">
                <h2 class="project-name">{{ $item->name }}</h2>
                <p class="municipality-text">@if($item->municipalities->first()) {{ $item->municipalities->first()->title }} @endif</p>
                @if($item->date > now())
                    <a href="{{ route('contact.show', ['project' => $item->name]) }}" class="button is-primary">Ik doe mee!</a>
                @else
                    <a href="#verlopen" class="button is-warning">Dit project is verlopen</a>
                @endif
            </div>
            @php($image = $item->imageAsArray('project_image', 'flexible'))
            @if($image)
                <img class="project-hero-image" src="">
            @else
                <div class="project-hero-no-image" aria-hidden="true">
                    <i class="fas fa-book fa-10x"></i>
                    <p>Dit project heeft geen afbeelding</p>
                </div>
            @endif
        </div>
    </section>
    <section class="section section-project-info">
        <h2 class="project-info-title">Informatie over het project</h2>
        <div class="info-grid">
            <div class="when">
                <h4>Wanneer?</h4>
                <p>Het project is op {{ $item->getCreatedDateForDetail() }}, en vind plaats om {{ $item->getCreatedTimeForView() }} uur</p>
            </div>
            <div class="where">
                <h4>Waar?</h4>
                @if($item->municipalities->first())
                    <p>Het vind zich plaats in de gemeente {{ $item->municipalities->first()->title }}, en op de locatie {{ $item->address }}</p>
                @else
                    <p>Het vind zich plaats op de locatie {{ $item->address }}</p>
                @endif
            </div>
            <div class="what">
                <h4>Wat we gaan doen?</h4>
                <p>{!! $item->description !!}</p>
            </div>
            <div class="map" aria-hidden="true">
                <iframe src="https://maps.google.com/maps?q={{ $item->address }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
        </div>
    </section>
    <section class="section section-attendees">
        <h2 class="attendee-title">Wie doen er mee?</h2>
        <div class="attendees">
            @foreach($item->municipalities as $municipality)
                <div class="attendee">
                    @php($image = $municipality->imageAsArray('municipality_picture', 'flexible'))
                    <img class="attendee-image" src="{{ $image ? $image['src'] : asset('img/house-placeholder.png') }}" alt="">
                    <h2 class="attendee-title">Gemeente {{ $municipality->title }}</h2>
                    <p class="attendee-text">{{ $municipality->description }}</p>
                    <a class="button is-primary" href="{{ route('municipality.show', $municipality->slug) }}">Lees meer</a>
                </div>
            @endforeach
            @foreach($item->farmers as $farmer)
                <div class="attendee">
                    @php($image = $farmer->imageAsArray('farmer_profile', 'flexible'))
                    @if($image)
                        <img class="attendee-image" src="{{ $image['src'] }}" alt="">
                    @else
                        <div class="attendee-no-image" aria-hidden="true">
                            <i class="fas fa-tractor fa-6x"></i>
                        </div>
                    @endif
                    <h2 class="attendee-title">{{ $farmer->name }}</h2>
                    <p class="attendee-text">{{ $farmer->summary }}</p>
                    <a class="button is-primary" href="{{ route('farmer.show', $farmer->slug) }}">Lees meer</a>
                </div>
            @endforeach
        </div>
        @if(count($item->municipalities) == 0 && count($item->farmers) == 0)
            <p class="no-attendees">Er zijn helaas geen aanwezigen bij dit project</p>
        @endif
    </section>
@endsection


