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
            </div>
        </div>

        <section class="hero is-primary">
            <div class="hero-body">
                <div class="columns is-tablet">
                    <div class="column is-one-third-tablet">
                        <a href="{{$highlight->url}}" target="#">
                            <div class="container is-flex-tablet is-justify-content-center is-flex-wrap-wrap">
                                <div class="is-flex is-align-items-center is-justify-content-center is-flex-wrap-wrap mb-4">
                                    <figure class="image is-64x64 mr-2">
                                            <img type="image/png" src="{{ asset('img/link_icons/'.$highlight->logo_url)}}" />
                                    </figure>
                                    <h1 class="has-text-centered is-size-2">{{$highlight->name}}</h1>
                                </div>

                                <br>
                                <div class="container">
                                    <div class="content">
                                        <p class="has-text-centered">{{ $highlight->pitch }}</p>
                                        <p class="has-text-centered has-text-weight-semibold">Bekijk deze pagina</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="divider is-vertical"></div>
                    <hr class="is-mobile">
                    <div class="column">
                        <div class="container">
                            <h1 class="title is-4 has-text-centered">Bekijk de andere pagina's van het Tiny Restaurant!</h1>
                            <br>
                            <div class="columns is-mobile is-multiline">
                               @foreach($homepage->homepage_link_items->where('position', '!=', 1)->all() as $link)
                                    <div class="column is-half-mobile">
                                        <a href="{{$link->url}}" target="#">
                                            <div class="is-flex is-justify-content-center is-flex-wrap-wrap">
                                                <div class="block">
                                                    <figure class="image is-64x64 mb-1">
                                                        <img type="image/png" src="{{ asset('img/link_icons/'.$link->logo_url) }}" />
                                                    </figure>
                                                    <p class="has-text-weight-medium has-text-centered">{{$link->name}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>

        <x-partners />
    </div>
@endsection

