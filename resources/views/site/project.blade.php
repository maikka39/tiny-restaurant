@extends('layouts.base')

@push('css')
    <link href="{{ asset('css/slideshow.css') }}" rel="stylesheet">
@endpush
@push('scripts') 
    <script type="text/javascript" src="{{asset('js/slideshow.js')}}" defer></script>
@endpush

@section('content')
    <div class="mx-4">
        <div>
            <h1 class="text-2xl mb-1 md:text-3xl lg:text-4xl">{{$item->name}}</h1>
            <p class="italic font-bold">Datum: <span class="font-normal">{{date('d-m-Y', strtotime($item->date))}}</span></p>
            <p class="italic font-bold">Tijd: <span class="font-normal">{{date('H:i', strtotime($item->date))}}</span></p>
            <p class="italic font-bold">Adres: <span class="font-normal">{{$item->address}}</span></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2">
            
            <div class="imgholder pt-3 lg:order-2 lg:ml-3">
                <img src="{{ $item->image("project_image", 'desktop') }}" alt="{{ $item->imageAltText("project_image") }}"/><br/>
            </div>
            <div class="max-w-full text-justify lg:order-1 lg:max-w-4xl lg:mr-3">
                {!! $item->description !!}
            </div>
        </div>

        @if (count($item->municipalities) > 0 || count($item->farmers) > 0)
            <!-- Slideshow container -->
            <div class="flex-container">
                <div class="slideshow-container">
                    @foreach ($item->municipalities as $municipality)
                        <div class='mySlides fade border-2 border-gray-300 mb-3 mt-3 shadow-lg'>
                            <img src=' {{ $municipality->image('municipality_picture', 'desktop') }} '
                            alt='Afbeelding Gemeente'>
                            <div class='p-2 h-auto flex justify-between items-center'>
                                <h5 class='text-xl font-bold'>Onze boeren uit gemeente {{ $municipality->title }}</h5>
                                <a href='{{ route('municipality.show', $municipality->slug) }}' class='m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'> Lees meer </a>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($item->farmers as $farmer)
                        <div class='mySlides fade border-2 border-gray-300 mb-3 mt-3 shadow-lg'>
                            <img src=' {{ $farmer->image('farmer_profile', 'desktop') }} '
                            alt='Afbeelding Boer'>
                            <div class='p-2 h-auto flex justify-between items-center'>
                                <h5 class='text-xl font-bold'> {{ $farmer->name }} </h5>
                                <a href='{{ route('farmer.show', $farmer->slug) }}' class='m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'> Lees meer </a>
                            </div>
                        </div>
                    @endforeach
                
                    <!-- Next and previous buttons -->
                    <a class="prev">&#10094;</a>
                    <a class="next">&#10095;</a>
                </div>
                <br>
                
                <!-- The dots/circles -->
                <div id='slideshowdots'>
                </div>
            </div>
        @endif

        <div class="self-center flex flex-col justify-center">
            <div class="self-center">{!! $item->renderBlocks(false) !!}</div>
        </div>
        <hr class="my-2">
    </div>
@endsection


