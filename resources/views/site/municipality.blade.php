@extends("site.layouts.base", [
    "title" => $municipality->title
])

@section("content")
    <div class="container my-4">
        <div class="flex flex-wrap place-content-around">
            <div class="flex flex-col w-3/6">
                <h1 class="">{{ $municipality->title }}</h1>
                <p class="text-justify">{{ $municipality->description }}</p>
            </div>

            <img class="municipalityImage shadow-lg rounded h-96"
                 src="{{ $municipality->image("municipality_picture", "desktop") }}">
        </div>
    </div>

    <div class="box primary">
        <div class="container">
            <div class="flex flex-wrap place-content-around">
                <div class="overflow-hidden md:w-3/6 sm:w-full">
                    <iframe class="w-full h-full overflow-hidden"
                            src="https://maps.google.com/maps?q={{ $municipality->title }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>

                <div class="flex flex-col lg:w-2/6 md:w-2/6 sm:w-full my-2">
                    <h2> Aankomend evenement </h2>
                    <p class="text-justify"> Kom ons bezoeken bij ons volgend evenement in {{ $municipality->title }}!
                        Ervaar wat voor heerlijks ons land te bieden heeft met een proeverij, en maak kennis met de boer
                        en
                        de chef die met liefde en vakmanschap het product tot stand hebben gebracht. </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if (count($municipality->farmers) > 0)
            <h2 class="text-center">Partners</h2>

            @foreach ($municipality->farmers->chunk(3) as $chunk)
                <div class="flex justify-around flex-wrap min-w-100">
                    @foreach ($chunk as $farmer)
                        <div class="box secondary">
                            <div class="flex justify-center">
                                <img class="h-64" src="{{ $farmer->image("farmer_profile", "desktop") }}"
                                     alt="{{ $farmer->name }}">
                            </div>
                            <h3>{{ $farmer->name }}</h3>
                            <div class="description">{!! $farmer->description !!}</div>
                            <a href="{{ route("farmer.show", $farmer->slug) }}" class="button primary float-right">Lees
                                meer</a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
    @if (count($municipality->projects) > 0)
        <h2 class="text-center">Projecten</h2>

        @foreach ($municipality->projects->chunk(3) as $chunk)
            <div class="flex justify-around flex-wrap min-w-100">
                @foreach ($chunk as $project)
                    <div class="box secondary lg:w-1/5 md:w-2/5">
                        <div class="flex justify-center">
                            <img class="h-64" src="{{ $project->image("project_image", "desktop") }}"
                                 alt="{{ $project->name }}">
                        </div>
                        <h3>{{ $project->name }}</h3>
                        <div class="description">{!! $project->description !!}</div>
                        <a href="{{ route("project.show", $project->slug) }}" class="button primary float-right">Lees
                            meer</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
@endsection