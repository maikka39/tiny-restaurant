@extends('site.layouts.base', [
    'title' => $item->title
])

@section('content')
    <div class="flex place-content-center">
        <div class="w-5/6 mt-4 mb-4">
            <div class="flex flex-wrap place-content-around">
                <div class="flex flex-col w-2/6">
                    <h1>{{ $item->name }}</h1>
                    <p class="text-justify">{!! $item->description !!}</p>
                </div>

                <img class="municipalityImage shadow-lg rounded w-4/6" src="{{ $item->image("farmer_profile", 'desktop') }}" alt="{{ $item->imageAltText("farmer_profile") }}" >
            </div>
        </div>
    </div>
    <div class="flex place-content-center box primary">
        <div class="w-5/6 mt-4 mb-4">
            @if(!empty($item->blocks))
                <div class="self-center flex flex-row justify-center mb-5">
                    <h2>
                        Volg {{ $item->name }} op social media!
                    </h2>
                </div>
                <div class="w-full flex flex-row place-content-around">
                    {!! $item->renderBlocks(false) !!}
                </div>
            @endif
        </div>
    </div>
@endsection
