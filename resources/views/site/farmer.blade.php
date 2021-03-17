@extends('layouts.base')

@section('content')
    <div class="flex justify-center flex-col">
        <h1 class="text-3xl text-center font-bold">{{ $item->name }}</h1>
        <hr class="my-2">

        <div>
            <h3 class="text-xl text-center font-semibold">Wie is {{ $item->name }}?</h3>
            <div class="flex justify-center text-center">
                {!! $item->description !!}
            </div>
            <br/>
            <p class="text-center">Boer {{ $item->name }} woont momenteel op {!! $item->address !!}</p>
            <p class="text-center">Deze boer is onderdeel van de boerenvereneging in {{ $item->municipality->name }}</p>
        </div>
        <hr class="my-2">

        @if(!empty($item->blocks))
            <div class="self-center flex flex-col justify-center">
                <h2 class="text-xl font-semibold">
                    <i class="fas fa-arrow-down"></i>
                    Check de boer op social media!
                    <i class="fas fa-arrow-down"></i>
                </h2>
                <div class="self-center">{!! $item->renderBlocks(false) !!}</div>
            </div>
            <hr class="my-2">
        @endif

        <img src="{{ $item->image("farmer_profile", 'desktop') }}" alt="{{ $item->imageAltText("farmer_profile") }}"/><br/>
    </div>
@endsection
