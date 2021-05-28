@extends('site.layouts.base')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/project_individual.css') }}">
@endpush

@section('content')
    <section class="section section-project-hero">
        <div class="is-flex hero-content">
            <div class="hero-content-info">
                <h2 class="project-name">{{ $item->name }}</h2>
                <p class="municipality-text">{{ $item->municipalities->first()->title }}</p>
                <a href="{{ url('/contact') }}" class="button is-primary">Ik doe mee!</a>
            </div>
                <a href="{{ route('contact.show', ['project' => $item->name]) }}" class="button is-primary">Ik doe mee!</a>
            @php($image = $item->imageAsArray('project_image', 'flexible'))
            @if($image)
                <img class="project-hero-image" src="{{ $image['src'] }}" alt="{{ $image['alt']}}">
            @else
                <div class="project-hero-no-image">
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
                <p>Het vind zich plaats in de gemeente {{ $item->municipalities->first()->title }}, en op de locatie {{ $item->address }}</p>
            </div>
            <div class="what">
                <h4>Wat we gaan doen?</h4>
                <p>{!! $item->description !!}</p>
            </div>
            <div class="map">
                <iframe src="https://maps.google.com/maps?q={{ $item->address }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
        </div>
    </section>
    <section class="section section-attendees">
        <h2 class="attendee-title">Wie doen er mee?</h2>
        <div class="attendees">
            @foreach($item->municipalities as $municipality)
                <div class="attendee">
                    <div>
                        @php($image = $municipality->imageAsArray('municipality_picture', 'flexible'))
                        @if($image)
                            <img class="attendee-image" src="{{ $image['src'] }}" alt="{{ $image['alt']}}">
                        @endif
                        <h2 class="attendee-title">Gemeente {{ $municipality->title }}</h2>
                        <p class="attendee-text">{{ $municipality->description }}</p>
                    </div>
                    <a class="button is-primary">Lees meer</a>
                </div>
            @endforeach
            @foreach($item->farmers as $farmer)
                <div class="attendee">
                    @php($image = $farmer->imageAsArray('farmer_profile', 'flexible'))
                    @if($image)
                        <img class="attendee-image" src="{{ $image['src'] }}" alt="{{ $image['alt']}}">
                    @endif
                    <h2 class="attendee-title">{{ $farmer->name }}</h2>
                    <p class="attendee-text">{{ $farmer->summary }}</p>
                    <a class="button is-primary">Lees meer</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('old_content')
    <div class="container">
        <div class="justify-center">
            <div class="py-6">
                <div class="lg:w-3/5 lg:mx-auto imgholder">
                    <img class="w-full" src="{{ $item->image("project_image", 'desktop') }}"
                         alt="{{ $item->imageAltText("project_image") }}"/><br/>
                </div>

                <div class="m-4 lg:mx-0">
                    <h1 class="projectTitle">{{$item->name}}</h1>
                    <h2>Waar/Waneer?</h2>
                    <div class="sidecard">
                        <p>Datum: <span>{{date('d-m-Y', strtotime($item->date))}}</span></p>
                        <p>Tijd: <span>{{date('H:i', strtotime($item->date))}}</span></p>
                        <p>Adres: <span>{{$item->address}}</span></p>
                        <div class="mr-1 mt-1 flex">
                            @if($item->active)
                                <p class="mr-2">Actief project</p><i
                                        class="mt-1 mr-1 fas fa-calendar-check fa-lg"></i>
                            @else
                                <p class="mr-2">Afgerond project</p><i
                                        class="mt-1 mr-1 fas fa-calendar-times fa-lg"></i>
                            @endif
                        </div>
                    </div>

                    <h2 class="mt-3">Wat gaan we doen?</h2>
                    <div class="descriptionbox">
                        {!! $item->description !!}
                    </div>

                    @if (count($item->municipalities) > 0 || count($item->farmers) > 0)
                        <h2>Wie doen er mee?</h2>
                        <div class="flex-container slideshow">
                            <div class="slideshow-container">
                                @foreach ($item->municipalities as $municipality)
                                    <div class='mySlides'>
                                        <div class="imgholder">
                                            <img src=' {{ $municipality->image('municipality_picture', 'desktop') }} '
                                                 alt='Afbeelding Gemeente'>
                                        </div>
                                        <div class='slidetextbox'>
                                            <h4 class="mr-3">Onze boeren uit gemeente {{ $municipality->title }}</h4>
                                            <a href='{{ route('municipality.show', $municipality->slug) }}'
                                               class='button primary '> Lees meer </a>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach ($item->farmers as $farmer)
                                    <div class='mySlides'>
                                        <div class="imgholder">
                                            <img src=' {{ $farmer->image('farmer_profile', 'desktop') }} '
                                                 alt='Afbeelding Boer'>
                                        </div>
                                        <div class='slidetextbox'>
                                            <h4> {{ $farmer->name }} </h4>
                                            <a href='{{ route('farmer.show', $farmer->slug) }}' class='button primary '>
                                                Lees meer </a>
                                        </div>
                                    </div>
                                @endforeach

                                <a class="prev">&#10094;</a>
                                <a class="next">&#10095;</a>
                            </div>
                            <br>

                            <div class="slideshowdots">
                            </div>
                        </div>
                    @endif
                </div>

                <div class="self-center flex flex-col justify-center">
                    <div class="self-center">{!! $item->renderBlocks(false) !!}</div>
                </div>
                <hr class="my-2">
            </div>
        </div>
    </div>
@endsection


