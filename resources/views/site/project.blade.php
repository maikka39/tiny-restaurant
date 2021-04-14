@extends('site.layouts.base')

@push('css')
    <link href="{{ asset('css/slideshow.css') }}" rel="stylesheet">
@endpush
@push('scripts') 
    <script type="text/javascript" src="{{asset('js/slideshow.js')}}" defer></script>
@endpush

@section('content')
    <div class="w-full flex justify-center">
        <div class="max-w-full py-6 lg:max-w-6xl">


            <div class="imgholder">
                <img class="w-full" src="{{ $item->image("project_image", 'desktop') }}" alt="{{ $item->imageAltText("project_image") }}"/><br/>
            </div>

            <div class="m-4 lg:mx-0">
                <div>
                    <h1 class="projectTitle">{{$item->name}}</h1>
                    <h2>Waar/Waneer?</h2>
                    <div class="sidecard">
                    <p>Datum: <span>{{date('d-m-Y', strtotime($item->date))}}</span></p>
                    <p>Tijd:  <span>{{date('H:i', strtotime($item->date))}}</span></p>
                    <p>Adres: <span>{{$item->address}}</span></p>
                    <div class="mr-1 mt-1 flex">
                        @if($item->active) 
                            <p class="mr-2">Actief project</p><i class="mt-1 mr-1 fas fa-calendar-check fa-lg"></i>
                        @else 
                            <p class="mr-2">Afgerond project</p><i class="mt-1 mr-1 fas fa-calendar-times fa-lg"></i>
                        @endif
                    </div>
                    </div>
                </div>

                <h2 class="mt-3">Wat gaan we doen?</h2>
                <div class="descriptionbox">
                    {!! $item->description !!}
                </div>
            </div>


            @if (count($item->municipalities) > 0 || count($item->farmers) > 0)
                <h2>Wie doen er mee?</h2>
                <!-- Slideshow container -->
                <div class="flex-container">
                    <div class="slideshow-container">
                        @foreach ($item->municipalities as $municipality)
                            <div class='mySlides'>
                                <img class="w-full" src=' {{ $municipality->image('municipality_picture', 'desktop') }} '
                                alt='Afbeelding Gemeente'>
                                <div class='slidetextbox'>
                                    <h4>Onze boeren uit gemeente {{ $municipality->title }}</h4>
                                    <a href='{{ route('municipality.show', $municipality->slug) }}' class='button primary'> Lees meer </a>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($item->farmers as $farmer)
                            <div class='mySlides'>
                                <img src=' {{ $farmer->image('farmer_profile', 'desktop') }} '
                                alt='Afbeelding Boer'>
                                <div class='slidetextbox'>
                                    <h4> {{ $farmer->name }} </h4>
                                    <a href='{{ route('farmer.show', $farmer->slug) }}' class='button primary'> Lees meer </a>
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
    </div>
@endsection

