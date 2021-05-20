@extends('site.layouts.base', [
    "title" => "Nieuwsberichten"
])

@section('content')
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