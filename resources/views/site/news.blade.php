@extends('site.layouts.base', [
    "title" => "Nieuwsberichten"
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/newsItem.css') }}"></style>
@endpush

@section('content')
    <h1 class="text-center">Nieuwsberichten</h1>
    <div class="timeline-component-wrapper">
        @foreach($newsItems as $newsItem)
            <div class="flex @if($loop->even) flex-row-reverse @endif md:contents">
                @if(!$loop->even)
                    <h4 class="publish-date col-start-3 col-end-5 ">
                        {{ $newsItem->getCreatedTimeForView() }}
                    </h4>
                    <x-time-line :isEven="$loop->even"></x-time-line>
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
                    <x-time-line :isEven="$loop->even"></x-time-line>
                    <h4 class="publish-date col-start-6 col-end-8">
                        {{ $newsItem->getCreatedTimeForView() }}
                    </h4>
                @endif
            </div>
        @endforeach
    </div>
@endsection