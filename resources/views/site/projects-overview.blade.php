@extends('site.layouts.base', [
    'title' => 'projecten'
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/projects.css') }}">
@endpush

@section('content')
    <section class="hero projects-hero">
        <div class="hero-body">
            <h1 class="is-size-1 has-text-centered has-text-weight-bold mt-2">Projecten</h1>
            <h3 class="is-size-3-desktop is-size-4-tablet is-size-5-mobile has-text-centered mt-4 mb-5">Bekijk de projecten waar wij ons op dit moment mee bezig houden!</h3>
            <form id="project-search-form">
                <div class="search-input field has-addons">
                    <p class="control is-expanded">
                        <label for="search" class="sr-only">Zoeken in projecten</label>
                        <input class="input" type="text" placeholder="Zoek naar projecten..." name="search" id="search" @if(request()->has('search'))value="{{ request()->query('search') }}"@endif>
                    </p>
                    <p class="control">
                        <a class="button search-button" onclick="document.querySelector('#project-search-form').submit()">
                            <i class="fas fa-search"></i>
                        </a>
                    </p>
                </div>
                @if(request()->has('search'))
                    <div class="clear-filter">
                        <a href="{{ route('project.showAll') }}">Verwijder "{{ request()->query('search') }}" filter</a>
                    </div>
                @endif
            </form>
        </div>
    </section>
    @if(count($projects) > 0)
        <section class="section section-timeline">
            <div class="timeline">
                <header class="timeline-header">
                    <span class="tag is-medium">Vandaag</span>
                </header>
                @foreach($projects as $project)
                    <div class="timeline-item">
                        <figure class="image timeline-image">
                            @php($image = $project->imageAsArray('project_image', 'flexible'))
                            <img src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
                        </figure>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-content-wrapper">
                                <small class="is-size-7 mb-2">{{ $project->municipalities->first()->title }}</small>
                                <p class="is-size-4 has-text-weight-bold mb-5">{{ $project->name }}</p>
                                <p>{!! $project->description !!}</p>
                                <div class="project-footer">
                                    <button class="button is-primary read-more-button"><a href="{{ route('project.show', $project->slug) }}">Lees meer</a></button>
                                    <small class="is-size-6">{{ $project->getCreatedTimeForView() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <header class="timeline-header">
                    <span class="tag is-medium">Einde</span>
                </header>
            </div>
        </section>
    @else
        <section class="section">
            <h3 class="is-size-4 has-text-centered">We hebben geen projecten voor je kunnen vinden :(</h3>
        </section>
    @endif
@endsection

{{--@section('old_content')--}}
{{--    <div class="flex justify-center px-2">--}}
{{--        <div class="container">--}}
{{--            <h1>Onze projecten</h1>--}}

{{--            <form method="POST" action="{{route('project.filter')}}">--}}
{{--                @csrf--}}

{{--                <div class="flex justify-between">--}}
{{--                    <div>--}}
{{--                        <label class="label" for="keyword">Zoekwoord</label>--}}
{{--                        <div class="flex flex-wrap md:flex-nowrap">--}}
{{--                        --}}
{{--                            <input class="mr-3" type="text" name="keyword" id="keyword" value="{{$selectedkeyword ?? ''}}">--}}
{{--                        --}}
{{--                            @error('keyword')--}}
{{--                                <p class="">{{$message}}</p>--}}
{{--                            @enderror--}}
{{--                            --}}
{{--                            <div class="mt-3 w-full md:mt-0 md:w-max">--}}
{{--                                <button class="button primary mr-2" type="submit">Filter</button>  --}}
{{--                                <a href="{{route('project.showAll')}}" class="button primary">Verwijder filters</a>--}}
{{--                            </div>    --}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label class="label" for="sort">Sorteren op</label>--}}
{{--                        <div class="flex flex-wrap md:flex-nowrap">                        --}}
{{--                            <select class="h-12" name="sort" id="sort" onchange="this.form.submit()">--}}
{{--                                <option value="date_descending" @if($sort == 'date_descending' || empty($sort)) selected @endif>Datum aflopend</option>--}}
{{--                                <option value="date_ascending" @if($sort == 'date_ascending') selected @endif>Datum oplopend</option>--}}
{{--                            </select>--}}
{{--                        --}}
{{--                            @error('sort')--}}
{{--                                <p class="">{{$message}}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            @forelse ($projects as $project)--}}
{{--                <div class="box secondary projectcard ">--}}
{{--                    <div class="cardimg">--}}
{{--                        <img  src="{{ $project->image("project_image", 'desktop') }}" alt="{{ $project->imageAltText("project_image") }}">--}}
{{--                    </div>--}}
{{--                    <div class="mainholder">--}}
{{--                        <div class="w-full flex justify-between">--}}
{{--                            <h2 >{{$project->name}}</h2>--}}
{{--                            <div class="mr-1 mt-1 flex">--}}
{{--                                @if($project->active) --}}
{{--                                    <p class="mr-2">Actief</p><i class="mt-1 mr-1 fas fa-calendar-check fa-lg"></i>--}}
{{--                                @else --}}
{{--                                    <p class="mr-2">Afgerond</p><i class="mt-1 mr-1 fas fa-calendar-times fa-lg"></i>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="infoholder">--}}
{{--                            <div class="w-2/3">--}}
{{--                                <p class="highlight">Datum: <span>{{date('d-m-Y', strtotime($project->date))}}</span></p>--}}
{{--                                <p class="highlight">Tijd:  <span>{{date('H:i', strtotime($project->date))}}</span></p>--}}
{{--                                <p class="highlight">Adres: <span>{{$project->address}}</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="linkholder">--}}
{{--                                <a href='{{ route('project.show', $project->slug) }}' class='button primary'> Lees meer </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--                <p>Geen resultaten gevonden</p>--}}
{{--            @endforelse --}}
{{--            {{ $projects->render() }}--}}
{{--        </div>--}}
{{--    </div>   --}}
{{--@endsection--}}