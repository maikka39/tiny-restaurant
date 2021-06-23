@php
    if ($status == "paid") {
        $status_title = "Bedankt voor uw donatie!";
        $status_message = "Uw betaling van &euro;". $amount . " is successvol afgerond.";
    } else if ($status == "open") {
        $status_title = "Donatie in behandeling";
        $status_message = "Uw betaling van &euro;" . $amount . " is nog in behandeling.";
    } else {
        $status_title = "Betaling mislukt";
        $status_message = "Er is iets misgegaan, de betaling kon helaas niet successvol worden voltooid.";
    }
@endphp

@extends("site.layouts.base", [
    "title" => $status_title,
    "description" => $status_message,
    "image" => $donationPage->imageAsArray('hero', 'desktop'),
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/donate.css') }}">
@endpush

@section('content')
    <div class="donate">
        @php
            $image = $donationPage->image('hero', 'flexible');
            $alt = $donationPage->imageAltText('hero');
        @endphp

        <div class="image-container">
            <figure class="image to-background">
                <img src="{{ $image }}" alt="{{ $alt }}" draggable="false" />
            </figure>
        </div>

        <div class="info-container">
            <h1 class="title is-size-3 has-text-weight-bold">{{ $status_title }}</h1>
            <p class="subtitle is-size-5">{!! $status_message !!}</p>
            @if ($status == "open")
                <button class="button is-primary mt-4" onclick="window.location.reload(true);">Verversen</button>
            @endif
        </div>
    </div>
@endsection
