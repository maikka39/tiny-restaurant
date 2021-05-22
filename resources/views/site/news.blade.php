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
                                <p>{{ $newsItem->summary }}</p>
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
            <h3 class="is-size-4 has-text-centered">Het hebben geen nieuwsberichten voor je kunnen vinden :(</h3>
        </section>
    @endif
@endsection

@section('old_content')
    <div class="container title-wrapper">
        <h1>Nieuwsberichten</h1>
        <form>
            <div class="field input w-1/2">
                <input type="text" placeholder="zoek hier..." id="search" name="search" @if(request()->has('search'))value="{{ request()->query('search') }}"@endif>
                <label for="search">Zoeken in nieuwsberichten</label>
            </div>
            <button class="button primary" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <div class="container timeline-component-wrapper">
        @foreach($newsItems as $newsItem)
            <div class="flex @if($loop->even) flex-row-reverse @endif md:contents">
                @if(!$loop->even)
                    <h4 class="publish-date col-start-3 col-end-5 ">
                        {{ $newsItem->getCreatedTimeForView() }}
                    </h4>
                @endif
                <div class="card @if($loop->even) card-left @else card-right @endif">
                    <h3 class="card-title" id="{{ $newsItem->title }}">
                        {{ $newsItem->title }}
                    </h3>
                    <div class="card-description"><p>{!! $newsItem->description !!}</p></div>
                    @if(count($newsItem->imagesAsArrays('cover', 'flexible')) > 0)
                        <div class="card-images">
                            @foreach($newsItem->imagesAsArrays('cover', 'flexible') as $image)
                                <img src="{{ $image["src"] }}" alt="{{ $image["alt"] }}" width="300" class="mr-1"/>
                            @endforeach
                        </div>
                    @endif
                    @if(count($newsItem->getTwillFilesWithName()) > 0)
                        <div class="card-attachments">
                            @foreach($newsItem->getTwillFilesWithName() as $file)
                                @if($file["hasPreview"])
                                    <iframe src="{{ $file["url"] }}" allowfullscreen loading="eager">{{ $file["filename"] }}</iframe>
                                @else
                                    <a href="{{ $file["url"] }}"    class="text-center">
                                        Download: <br>
                                        <span class="break-all">{{ $file["filename"] }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    <small class="card-post-time">{{ $newsItem->getTimeSincePosted() }} geleden</small>
                </div>
                @if($loop->even)
                    <h4 class="publish-date col-start-6 col-end-8">
                        {{ $newsItem->getCreatedTimeForView() }}
                    </h4>
                @endif
            </div>
        @endforeach
    </div>
@endsection