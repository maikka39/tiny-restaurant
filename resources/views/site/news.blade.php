@extends('site.layouts.base', [
    "title" => "Nieuwsberichten"
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endpush

@section('content')
    <section class="hero news-hero">
        <div class="hero-body">
            <h1 class="is-size-1 has-text-centered has-text-weight-bold mt-2">Nieuws</h1>
            <h3 class="is-size-3-desktop is-size-4-tablet is-size-5-mobile has-text-centered mt-4 mb-5">Bekijk het laatste nieuws van het Tiny Restaurant en check wat er momenteel gaande is.</h3>
            <form id="news-search-form">
                <div class="search-input field has-addons">
                    <p class="control is-expanded">
                        <label for="search" class="sr-only">Zoeken in nieuwsberichten</label>
                        <input class="input" type="text" placeholder="Zoek naar nieuwsberichten..." name="search" id="search" @if(request()->has('search'))value="{{ request()->query('search') }}"@endif>
                    </p>
                    <p class="control">
                        <a class="button search-button" onclick="document.querySelector('#news-search-form').submit()">
                            <i class="fas fa-search"></i>
                        </a>
                    </p>
                </div>
                @if(request()->has('search'))
                    <div class="clear-filter">
                        <a href="{{ route('newsItems.show') }}">Verwijder "{{ request()->query('search') }}" filter</a>
                    </div>
                @endif
            </form>
        </div>
    </section>
    @if(count($newsItems) > 0)
        <section class="section section-timeline">
            <div class="timeline">
                <header class="timeline-header">
                    <span class="tag is-medium">Vandaag</span>
                </header>
                @foreach($newsItems as $newsItem)
                    <div class="timeline-item">
                        <figure class="image timeline-image">
                            @php($image = $newsItem->imageAsArray('cover', 'flexible'))
                            <img src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
                        </figure>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-content-wrapper">
                                <small class="is-size-7 mb-2">{{ $newsItem->getCreatedTimeForView() }}</small>
                                <p class="is-size-4 has-text-weight-bold mb-5">{{ $newsItem->title }}</p>
                                <p class="mb-3">{{ $newsItem->summary }}</p>
                                <a href="{{ route('newsItem.show', $newsItem->id) }}" class="is-primary read-more">Lees meer</a>
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
            <h3 class="is-size-4 has-text-centered">We hebben geen nieuwsberichten voor je kunnen vinden :(</h3>
        </section>
    @endif
@endsection
