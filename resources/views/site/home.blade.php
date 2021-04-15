@extends('site.layouts.base')

@section('content')
    <div class="w-container mx-auto mb-5">
        <div class="hero grid md:grid-cols-5">
            <div class="pl-12 md:col-span-3 md:mt-32">
                <div class="content">
                    <h1>{{$bannerTitle}}</h1>
                    <p class="mb-2">{{$bannerDescription}}</p>
                    <a href="{{url("/contact")}}" class="button primary float-right">Neem contact op!</a>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 py-1">
            <div class="col-span-3 md:col-span-2">
                <h2>Activiteiten</h2>
                <p>Momenteel geen activiteiten</p>
            </div>
            <div class="col-span-3 md:col-span-1 mt-36 grid gap-y-6 md:gap-y-12">
                <div class="sidecard row">
                    <h4>Agenda</h4>
                    <p>Agenda is leeg</p>
                </div>
                <div class="sidecard row">
                    <h4>Links</h4>
                    <p>Geen links</p>
                </div>
            </div>
        </div>
    </div>
@endsection
