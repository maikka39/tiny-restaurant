@extends('site.layouts.base', [
    'title' => $news->title,
    'pagetype' => 'article',
    'pagecreatedtime' => $news->created_at->format('c'),
    'pagemodifiedtime' => Carbon\Carbon::parse($news->updated_at)->format('c'),
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
        <h3 class="hero-images-title">Bekijk de uitgelichte fotos</h3>
        <div class="images">
            @foreach(array_slice($news->imagesAsArrays('cover', 'flexible'),0,3) as $image)
                <figure class="image is-3by2">
                    <img src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
                </figure>
            @endforeach
        </div>
    </section>
    <section class="section section-news-description">
        <h2 class="description-title">Meer informatie</h2>
        <div class="description">{!! $news->description !!}</div>
    </section>
    <section class="section section-news-attachments">
        <h2 class="attachments-title">Bekijk alle bijgevoegde foto's en bestanden</h2>
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