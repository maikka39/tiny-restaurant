@extends("site.layouts.base", [
    "title" => $homepage->title
])

@section('content')
    <div class="w-container mx-auto mb-5">
        <div class="hero grid md:grid-cols-5">
            <div class="pl-12 md:col-span-3 md:mt-32">
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
                    @forelse($homepage->homepage_link_items()->get() as $link)
                        <a href="{{$link->url}}" target="_blank">{{$link->name}}</a>
                    @empty
                        Momenteel geen links
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

