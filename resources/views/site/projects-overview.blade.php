@extends('layouts.base')

@section('content') 
    <div class="w-full flex justify-center px-2">
        <div class="w-full lg:max-w-4xl">
            <h1 class="text-2xl font-bold">Onze projecten</h1><br>

            <form method="POST" action="/projecten">
                @csrf

                <label class="label" for="keyword">Zoekwoord</label>
                <div class="flex flex-wrap md:flex-nowrap">
                    
                
                    <input class="input mr-2 mb-2" type="text" name="keyword" id="keyword" value="{{old('keyword')}}">
                
                    @error('keyword')
                        <p class="">{{$message}}</p>
                    @enderror
                
                    <div>
                        <button type="submit" class="button">Plaats reservering</button>  
                    </div>
                </div>
            </form>

            @forelse ($projects as $project)
                <div class="projectcard">
                    <div class="w-full md:w-1/3 ">
                        <img src="{{ $project->image("project_image", 'desktop') }}" alt="{{ $project->imageAltText("project_image") }}">
                    </div>
                    <div class="mainholder">
                        <div class="flex justify-between">
                            <h2  class="w-2/3">{{$project->name}}</h2>
                            <div class="mr-1 mt-1 flex">
                                @if($project->active) 
                                    <p class="mr-2">Actief</p><i class="mt-1 mr-1 fas fa-calendar-check fa-lg"></i>
                                @else 
                                    <p class="mr-2">Afgerond</p><i class="mt-1 mr-1 fas fa-calendar-times fa-lg"></i>
                                @endif
                            </div>
                        </div>
                        <div class="infoholder">
                            <div class="w-2/3">
                                <p class="highlight">Datum: <span>{{date('d-m-Y', strtotime($project->date))}}</span></p>
                                <p class="highlight">Tijd:  <span>{{date('H:i', strtotime($project->date))}}</span></p>
                                <p class="highlight">Adres: <span>{{$project->address}}</span></p>
                            </div>
                            <div class="linkholder">
                                <a href='{{ route('project.show', $project->slug) }}' class='button readmore'> Lees meer </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Geen resultaten gevonden</p>
            @endforelse 

            {{ $projects->render() }}
        </div>
    </div>

    
@endsection