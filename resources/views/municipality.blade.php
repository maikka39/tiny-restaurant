@extends('site.layouts.municipalityLayout', [
    'title' => 'Gemeente'
])
@section('content')
<div class="flex place-content-center">
    <div class="w-5/6 mt-4 mb-4">
        <div class="flex flex-row place-content-around">
            <div class="flex flex-col w-3/6">
                <h1 class="font-bold text-gray-600 text-5xl"> {{ $municipality->name }} </h1>
                <p class="text-justify"> {{ $municipality->body }} </p>
            </div>
            <div>
                <img class="municipalityImage shadow-lg" src="{{ $municipalityImageURL }}" class="rounded" alt="maps">
            </div>
        </div>
    </div>
</div>
<div class="nextEventDiv flex place-content-center">
    <div class="w-5/6">
        <div class="flex flex-row place-content-around">
            <div class="flex flex-col w-3/6">
                <!-- Google Maps -->
            </div>
            <div class="flex flex-col justify-content-center w-2/6 mt-3 mb-3">
                <h3 class="font-bold text-white text-4xl"> Aankomende evenement: </h3>
                <p class="text-justify text-lg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sollicitudin, neque et ultrices pulvinar, ipsum libero mattis massa, in pharetra dui lacus vitae urna. Integer vulputate laoreet lectus, in iaculis lectus finibus egestas. Phasellus quis elementum purus. Donec at auctor ex. Vestibulum vel egestas ante. Aliquam at turpis vitae lectus commodo varius sit amet et leo. Vestibulum bibendum ultricies tortor, a aliquet neque aliquam at.</p>
            </div>
        </div>
    </div>
</div>
<br>
@if (count($municipality->partners) > 0)
<h3 class='text-xl font-bold text-center'> Partners: </h3>
<div class='flex flex-wrap justify-around'>
    @foreach ($municipality->partners as $partner)
        <div class='card border-2 border-gray-300 mb-3 mt-3 shadow-lg'>
            <img src='{{ url("/images/" . $partner->picture) }} ';
            alt='Afbeelding Boer'>
            <div class='p-2 h-auto'>
                <h5 class='text-xl font-bold'> {{ $partner->name }} </h5>
                <p> {{ $partner->description }} </p>
                <button href='#' class='m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right'> Lees meer </button>
            </div>
        </div>
    @endforeach
</div>
@endif
@endsection