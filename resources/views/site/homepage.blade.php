@extends("site.layouts.base", [
    "title" => $homepage->title
])

@section('content')
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

        <section class="hero is-primary">
            <div class="hero-body">
                <div class="columns">
                    <div class="column is-narrow">
                        <a href="{{$homepage->highlight_link_url}}" target="#">
                            <div class="columns is-variable is-2">
                                <div class="column is-narrow">
                                    <figure class="image is-64x64">
                                        <img type="image/png" src="{{ asset('img/link_icons/'.$homepage->highlight_link_logo_url) }}" />
                                    </figure>
                                </div>
                                <div class="column">
                                    <h1 class="is-size-2">{{$homepage->highlight_link_name}}</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="column is-two-thirds">
                        Second
                    </div>
                </div>
            </div>
          </section>

        <x-partners />
    </div>
@endsection

