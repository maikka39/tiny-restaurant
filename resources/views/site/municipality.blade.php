@extends("site.layouts.base", [
    "title" => $municipality->title
])

@section("content")
    <div class="flex place-content-center">
        <div class="w-5/6 mt-4 mb-4">
            <div class="flex flex-wrap place-content-around">
                <div class="flex flex-col w-3/6">
                    <h1 class="">{{ $municipality->title }}</h1>
                    <p class="text-justify">{{ $municipality->description }}</p>
                </div>

                <img class="municipalityImage shadow-lg rounded h-96" src="{{ $municipality->image("municipality_picture", "desktop") }}">
            </div>
        </div>
    </div>

    <div class="nextEventDiv flex place-content-center box primary">
        <div class="lg:w-5/6 md:w-full sm:w-full">
            <div class="flex flex-wrap place-content-around">
                <div class="overflow-hidden lg:w-3/6 md:w-3/6 sm:w-full">
                        <iframe class="w-full h-full overflow-hidden"
                    src="https://maps.google.com/maps?q={{ $municipality->title }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
                    
                <div class="flex flex-col lg:w-2/6 md:w-2/6 sm:w-full mt-2 mb-2">
                    <h2> Aankomend evenement </h2>
                    <p class="text-justify"> Kom ons bezoeken bij ons volgend evenement in {{ $municipality->title }}! Ervaar wat voor heerlijks ons land te bieden heeft met een proeverij, en maak kennis met de boer en de chef die met liefde en vakmanschap het product tot stand hebben gebracht. </p>
                </div>
            </div>
        </div>
    </div>

    @if (count($municipality->farmers) > 0)
        <h2 class="text-center">Partners</h2>

        @foreach ($municipality->farmers->chunk(3) as $chunk)
            <div class="flex justify-around flex-wrap min-w-100">
                @foreach ($chunk as $farmer)
                    <div class="box secondary">
                        <img class="h-64" src="{{ $farmer->image("farmer_profile", "desktop") }}" alt="{{ $farmer->name }}">

                        <div>
                            <h3>{{ $farmer->name }}</h3>
                            <div class="description">{!! $farmer->description !!}</div>
                            <a href="{{ route("farmer.show", $farmer->slug) }}" class="button primary float-right">Lees meer</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
@endsection