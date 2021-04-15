@extends('site.layouts.base')

@push('styles')
    <link href="{{ asset('css/_project.css') }}" rel="stylesheet">
@endpush

@section('content') 
    <div class="w-full flex justify-center px-2">
        <div class="w-full lg:max-w-6xl">
            <h1>Onze projecten</h1>

            <form method="POST" action="{{route('project.filter')}}">
                @csrf

                <div class="flex justify-between">
                    <div>
                        <label class="label" for="keyword">Zoekwoord</label>
                        <div class="flex flex-wrap md:flex-nowrap">
                            
                            @php 
                                $selectedkeyword = $keyword ?? '';
                            @endphp
                        
                            <input class="mr-3" type="text" name="keyword" id="keyword" value="{{$selectedkeyword}}">
                        
                            @error('keyword')
                                <p class="">{{$message}}</p>
                            @enderror
                            
                            <div class="mt-3 w-full md:mt-0 md:w-max">
                                <button class="button primary mr-2" type="submit">Filter</button>  
                                <a href="{{route('project.showAll')}}" class="button primary">Verwijder filters</a>
                            </div>    
                        </div>
                    </div>

                    <div>
                        <label class="label" for="sort">Sorteren op</label>
                        <div class="flex flex-wrap md:flex-nowrap">
                            
                            @php
                                $selected = $sort ?? 'date_descending'; 
                            @endphp
                        
                            <select class="h-12" name="sort" id="sort" onchange="this.form.submit()">
                                <option value="date_descending" @if($selected == 'date_descending') selected @endif>Datum aflopend</option>
                                <option value="date_ascending" @if($selected == 'date_ascending') selected @endif>Datum oplopend</option>
                            </select>
                        
                            @error('sort')
                                <p class="">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>

            @forelse ($projects as $project)
                <div class="box secondary projectcard ">
                    <div class="cardimg">
                        <img  src="{{ $project->image("project_image", 'desktop') }}" alt="{{ $project->imageAltText("project_image") }}">
                    </div>
                    <div class="mainholder">
                        <div class="w-full flex justify-between">
                            <h2 >{{$project->name}}</h2>
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
                                <a href='{{ route('project.show', $project->slug) }}' class='button primary'> Lees meer </a>
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