@extends('layouts.base')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/newsItem.css') }}"></style>
@endpush

@section('content')
    <h1 class="text-center font-semibold text-2xl">Nieuws berichten</h1>
    <div class="timeline-component-wrapper">
        @foreach($newsItems as $newsItem)
                <div class="flex @if($loop->even) flex-row-reverse @endif md:contents">
                    @if(!$loop->even)
                        <x-time-line></x-time-line>
                    @endif
                    <div class="card @if($loop->even) col-start-1 col-end-5 @else col-start-6 col-end-10 @endif">
                        <h3 class="card-title">{{ $newsItem->title }}</h3>
                        <div class="py-4 px-4"><p>{!! $newsItem->description !!}</p></div>
                        <div class="max-h-16 overflow-hidden">
                            @foreach($newsItem->imagesAsArrays('cover', 'flexible') as $image)
                                <img src="{{ $image["src"] }}" alt="{{ $image["alt"] }}" width="{{ $image["width"] }}" height="{{ $image["height"] }}"/>
                            @endforeach
                        </div>
                        <small class="pl-4">{{ $newsItem->getTimeSincePosted() }} geleden</small>
                    </div>
                    @if($loop->even)
                        <x-time-line></x-time-line>
                    @endif
                </div>
        @endforeach
    </div>
@endsection