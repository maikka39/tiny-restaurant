@extends('layouts.base')

@section('content')
    <div class="mx-4">
        <div>
            <h1 class="text-2xl mb-1 md:text-3xl lg:text-4xl">{{$item->name}}</h1>
            <p class="italic font-bold">Datum: <span class="font-normal">{{date('d-m-Y', strtotime($item->date))}}</span></p>
            <p class="italic font-bold">Tijd: <span class="font-normal">{{date('H:i', strtotime($item->date))}}</span></p>
            <p class="italic font-bold">Adres: <span class="font-normal">{{$item->address}}</span></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2">
            
            <div class="imgholder pt-3 lg:order-2 lg:ml-3">
                <img src="{{ $item->image("project_image", 'desktop') }}" alt="{{ $item->imageAltText("project_image") }}"/><br/>
            </div>
            <div class="max-w-full text-justify lg:order-1 lg:max-w-4xl lg:mr-3">
                {!! $item->description !!}
            </div>
        </div>

        <div class="self-center flex flex-col justify-center">
            <div class="self-center">{!! $item->renderBlocks(false) !!}</div>
        </div>
        <hr class="my-2">
    </div>
@endsection
