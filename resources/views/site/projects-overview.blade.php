@extends('layouts.base')

@section('content') 
    <div class="w-full flex justify-center px-2">
        <div class="max-w-full lg:max-w-4xl">
            <h1 class="text-2xl font-bold">Onze projecten</h1>

            @foreach ($projects as $project)
                <div class="projectcard">
                    <div class="w-full md:w-1/3 ">
                        <img src="{{ $project->image("project_image", 'desktop') }}" alt="{{ $project->imageAltText("project_image") }}">
                    </div>
                    <div class="mainholder">
                        <h2>{{$project->name}}</h2>
                        <div class="infoholder">
                            <div class="w-2/3">
                                <p class="highlight">Datum: <span>{{date('d-m-Y', strtotime($project->date))}}</span></p>
                                <p class="highlight">Tijd:  <span>{{date('H:i', strtotime($project->date))}}</span></p>
                                <p class="highlight">Adres: <span>{{$project->address}}</span></p>
                            </div>
                            <div class="linkholder">
                                <a href='{{ route('project.show', $project->slug) }}' class='readmore'> Lees meer </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $projects->render() }}
        </div>
    </div>

    
@endsection