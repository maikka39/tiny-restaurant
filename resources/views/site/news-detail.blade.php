@extends('site.layouts.base', [
    'title' => $news->title
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/news_individual.css') }}">
@endpush


@section('content')
    <section class="section section-hero-news">
        <div class="hero-text">
            <h2 class="hero-news-title">{{ $news->title }}</h2>
            <p class="hero-news-summary">{{ $news->summary }}</p>
        </div>
        @php($image = $news->imageAsArray('cover', 'flexible'))
        <img src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
    </section>
    <section class="section section-news-description">
        <h2 class="description-title">Meer informatie</h2>
        <div class="description">{!! $news->description !!}</div>
    </section>
    <section class="section section-news-attachments">
        <h2 class="attachments-title">Bekijk de bijgevoegde foto's en bestanden</h2>
        <div class="attachments">
            @foreach($news->getTwillFilesWithName() as $file)
                <div class="attachment">
                    @if($file["hasPreview"])
                        <iframe src="{{ $file["url"] }}" allowfullscreen loading="eager">{{ $file["filename"] }}</iframe>
                    @else
                        <a href="{{ $file['url'] }}" class="link">Klik hier om {{ $file['filename'] }} te downloaden</a>
                    @endif
                </div>
            @endforeach
            @foreach($news->imagesAsArrays('cover', 'flexible') as $image)
                <div class="attachment">
                    <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" />
                </div>
            @endforeach
        </div>
    </section>
@endsection