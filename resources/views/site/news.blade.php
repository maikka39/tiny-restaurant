@extends('layouts.base')

@section('content')
    <h1 class="text-center font-semibold text-2xl">Nieuws berichten</h1>
    <div class="flex flex-col md:grid grid-cols-9 mx-auto p-2" >
        @foreach($newsItems as $newsItem)
            @if($loop->even)
                {{-- RIGHT ITEM --}}
                <div class="flex flex-row-reverse md:contents">
                    <div class="bg-gray-300 col-start-1 col-end-5 rounded-xl my-4 ml-auto shadow-md text-right">
                        <h3 class="font-semibold text-lg mb-1 text-gray-800 bg-purple-400 rounded-t-xl py-2 px-4">{{ $newsItem->title }}</h3>
                        <div class="py-4 px-4">
                            <p class="leading-tight text-justify text-gray-600">{!! $newsItem->description !!}</p>
                        </div>
                        <div class="max-h-16 overflow-hidden">
                            @foreach($newsItem->imagesAsArrays('cover', 'flexible') as $image)
                                <img src="{{ $image["src"] }}" alt="{{ $image["alt"] }}" width="{{ $image["width"] }}" height="{{ $image["height"] }}"/>
                            @endforeach
                        </div>
                        <small class="pr-4">{{ $newsItem->getTimeSincePosted() }} geleden</small>
                    </div>
                    <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                        <div class="h-full w-9 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                        </div>
                        <div class="w-9 h-9 absolute top-1/2 -mt-3 rounded-full bg-gray-400 shadow text-center">
                            <i class="fa fa-arrow-left align-middle pt-1"></i>
                        </div>
                    </div>
                </div>
            @else
                {{-- LEFT ITEM --}}
                <div class="flex md:contents">
                    <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                        <div class="h-full w-9 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-800 pointer-events-none"></div>
                        </div>
                        <div class="w-9 h-9 absolute top-1/2 -mt-3 rounded-full bg-gray-400 shadow text-center">
                            <i class="fa fa-arrow-right align-middle pt-1"></i>
                        </div>
                    </div>
                    <div class="bg-gray-300 col-start-6 col-end-10 rounded-xl my-4 mr-auto shadow-md ">
                        <h3 class="font-semibold text-lg mb-1 text-gray-800 bg-purple-400 rounded-t-xl py-2 px-4">{{ $newsItem->title }}</h3>
                        <div class="py-4 px-4">
                            <p class="leading-tight text-justify text-gray-600">{!! $newsItem->description !!}</p>
                        </div>
                        <div class="max-h-16 overflow-hidden">
                            @foreach($newsItem->imagesAsArrays('cover', 'flexible') as $image)
                                <img src="{{ $image["src"] }}" alt="{{ $image["alt"] }}" width="{{ $image["width"] }}" height="{{ $image["height"] }}"/>
                            @endforeach
                        </div>
                        <small class="pl-4">{{ $newsItem->getTimeSincePosted() }} geleden</small>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection