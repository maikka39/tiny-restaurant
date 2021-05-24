@extends("site.layouts.base", [
    "title" => $homepage->title
])

@section('old-content')
    <div class="container mb-5">
        <div class="hero grid md:grid-cols-5">
            <div class="pl-12 lg:col-span-3 md:col-span-5 md:mt-32 md:pr-10">
                <div class="content">
                    <h1>{{$homepage->title}}</h1>
                    <p class="mb-2">{{$homepage->banner}}</p>
                    <a href="#" class="button primary float-right">Neem contact op!</a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 py-1">
            <div class="col-span-3 md:col-span-2">
                <x-latest-news />
            </div>

            <div class="col-span-3 md:col-span-1 mt-36 grid gap-y-6 md:gap-y-12">
                <div class="sidecard row">
                    <h4>Agenda</h4>
                    @forelse($agendaItems as $item)
                        <a class="agenda-item" href="{{ route('project.show', \Illuminate\Support\Str::slug($item->name)) }}">{{ $item->agendaDate() }} {{ $item->name }}</a><br>
                    @empty
                        <p>Geen agenda items</p>
                    @endforelse
                </div>
                <div class="sidecard row">
                    <h4>Links</h4>
                    <div class="flex flex-col">
                    @forelse($homepage->homepage_link_items as $link)
                        <a href="{{$link->url}}" target="_blank">{{$link->name}}</a>
                    @empty
                        Momenteel geen links
                    @endforelse
                    </div>
                </div>
            </div>
        </div>

        <x-partners />
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')   
    <!-- Hero -->
    <section class="section">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column">
                    <h1 class="title">Tiny Restaurant</h1>
                    <p class="subtitle">Welkom op onze website!</p>
                    
                    <a class="button is-primary" href="#projecten">Projecten</a>
                </div>
                
                <div class="column">
                    <figure class="image is-256x256">
                        <img src="https://bulma.io/images/placeholders/256x256.png" />
                    </figure>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Social media -->
    <section class="section is-medium has-text-centered">
        <div class="container">
            <p>Social media hier</p>
        </div>
    </section>
    
    <!-- Latest news -->
    <section class="section">
        <div class="container">
            <x-latest-news />
        </div>
    </section>
    
    <!-- Projects -->
    <section class="section">
        <div class="container">
            <x-projects />
        </div>
    </section>
    
    <!-- Partner slideshow -->
    <section class="section has-text-centered">
        <div class="container">
            <p>Slideshow hier</p>
        </div>
    </section>
    
    <!-- Partners -->
    <section class="section is-medium has-text-centered">
        <div class="container">
            <x-partners />
        </div>
    </section>
@endsection
