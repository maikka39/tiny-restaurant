@extends("site.layouts.base", [
    "title" => $municipality->title
])

@section("content")
    <div class="flex place-content-center">
        <div class="w-5/6 mt-4 mb-4">
            <div class="flex flex-row place-content-around">
                <div class="flex flex-col w-3/6">
                    <h1 class="font-bold text-gray-600 text-5xl">{{ $municipality->title }}</h1>
                    <p class="text-justify">{{ $municipality->description }}</p>
                </div>

                <img class="municipalityImage shadow-lg rounded" src="{{ $municipality->image("municipality_picture", "desktop") }}">
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

    @if (count($municipality->farmers) > 0)
        <h3 class="title">Partners</h3>

        @foreach ($municipality->farmers->chunk(3) as $chunk)
            <div class="columns">
                @foreach ($chunk as $farmer)
                    <div class="card">
                        <img src="{{ $farmer->image("farmer_profile", "desktop") }}" alt="{{ $farmer->name }}">

                        <div class="body">
                            <h3>{{ $farmer->name }}</h3>
                            <div class="description">{!! $farmer->description !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
@endsection