@extends('site.layouts.base', [
    'title' => 'projecten'
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/projects.css') }}">
@endpush

@section('content')
    <section class="hero projects-hero">
        <div class="hero-body">
            <h1 class="is-size-1 has-text-centered has-text-weight-bold mt-2">Projecten</h1>
            <h3 class="is-size-3-desktop is-size-4-tablet is-size-5-mobile has-text-centered mt-4 mb-5">Bekijk de projecten waar wij ons op dit moment mee bezig houden!</h3>
            <form id="project-search-form">
                <div class="search-input field has-addons">
                    <p class="control is-expanded">
                        <label for="search" class="sr-only">Zoeken in projecten</label>
                        <input class="input" type="text" placeholder="Zoek naar projecten..." name="search" id="search" @if(request()->has('search'))value="{{ request()->query('search') }}"@endif>
                    </p>
                    <p class="control">
                        <a class="button search-button" onclick="document.querySelector('#project-search-form').submit()">
                            <i class="fas fa-search"></i>
                        </a>
                    </p>
                </div>
                @if(request()->has('search'))
                    <div class="clear-filter">
                        <a href="{{ route('project.showAll') }}">Verwijder "{{ request()->query('search') }}" filter</a>
                    </div>
                @endif
            </form>
        </div>
    </section>
    @if(count($projects) > 0)
        <section class="section section-timeline">
            <div class="timeline">
                <header class="timeline-header">
                    <span class="tag is-medium">Vandaag</span>
                </header>
                @foreach($projects as $project)
                    <div class="timeline-item">
                        <figure class="image timeline-image">
                            @php($image = $project->imageAsArray('project_image', 'flexible'))
                            <img src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
                        </figure>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-content-wrapper">
                                <small class="is-size-7 mb-2">{{ $project->municipalities->first()->title }}</small>
                                <p class="is-size-4 has-text-weight-bold mb-5">{{ $project->name }}</p>
                                <p>{!! $project->description !!}</p>
                                <div class="project-footer">
                                    <button class="button is-primary read-more-button"><a href="{{ route('project.show', $project->slug) }}">Lees meer</a></button>
                                    <small class="is-size-6">{{ $project->getCreatedDateForOverview() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <header class="timeline-header">
                    <span class="tag is-medium">Einde</span>
                </header>
            </div>
        </section>
    @else
        <section class="section">
            <h3 class="is-size-4 has-text-centered">We hebben geen projecten voor je kunnen vinden :(</h3>
        </section>
    @endif
@endsection