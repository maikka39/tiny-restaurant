@extends('site.layouts.base')

@section('content')
    <section class="section is-medium">
        <div class="container">
            <h1 class="title is-size-1">{{ $code ?? '' }}</h1>
            <h2 class="subtitle is-size-3">{{ $message ?? '' }}</h2>
    
            <div class="block">
                <a class="button is-primary" href="/">Home</a>
            </div>
        </div>
    </section>

    <section class="section train">
        <marquee direction="right" scrollamount="10">
            <img src="{{ asset('img/train.png') }}" alt="Tiny Treintje">
        </marquee>
    </section>
@endsection
