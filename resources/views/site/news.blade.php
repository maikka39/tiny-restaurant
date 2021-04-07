@extends('layouts.base')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/newsItem.css') }}"></style>
    <link rel="stylesheet" href="{{ asset('css/wysiwyg.css') }}"></style>
@endpush

@section('content')
    <h1 class="text-center font-semibold text-2xl">Nieuws berichten</h1>
    <div class="timeline-component-wrapper">
        @foreach($newsItems as $newsItem)
            <div class="flex @if($loop->even) flex-row-reverse @endif md:contents">
                @if(!$loop->even)
                    <span class="publish-date col-start-3 col-end-5 ">
                        {{ $newsItem->getCreatedTimeForView() }}
                    </span>
                    <x-time-line :isEven="$loop->even"></x-time-line>
                @endif
                <div class="card @if($loop->even) card-left @else card-right @endif">
                    <h3 class="card-title" id="{{ $newsItem->title }}">
                        <i class="fa fa-newspaper"></i>
                        {{ $newsItem->title }}
                    </h3>
                    <div class="py-4 px-4"><p>{!! $newsItem->description !!}</p></div>
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
                                <iframe class="m-0 p-0" src="{{ $file["url"] }}" allowfullscreen loading="eager">{{ $file["filename"] }}</iframe>
                            @endforeach
                        </div>
                    @endif
                    <small class="pl-4">{{ $newsItem->getTimeSincePosted() }} geleden</small>
                </div>
                @if($loop->even)
                    <x-time-line :isEven="$loop->even"></x-time-line>
                    <span class="publish-date col-start-6 col-end-8">
                        {{ $newsItem->getCreatedTimeForView() }}
                    </span>
                @endif
            </div>
        @endforeach
    </div>
@endsection