@extends('site.layouts.base')

@section('content')
    <div class="w-container mx-auto">
        <div class="hero relative">
            <div class="absolute top-1/2">
                <div class="content">
                    <h1>Het Tiny Restaurant</h1>
                    <p>Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te
                        gaan?</p>
                    <a href="/contact" class="button primary">Neem contact op!</a>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 py-1">
            <div class="col-span-2">
                <h2>Activiteiten</h2>
                <p>Momenteel geen activiteiten</p>
            </div>
            <div class="col-span-1 mt-48 grid gap-y-6 md:gap-y-12">
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
