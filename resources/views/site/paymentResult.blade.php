
@extends("site.layouts.base", [
    "title" => "Betaling"
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
            @if ($status == "paid")
                <h1 class="title is-size-3 has-text-weight-bold">Bedankt voor uw donatie!</h1>
                <p class="subtitle is-size-5">Uw betaling van €{{ $amount }} is successvol afgerond.</p>
            @elseif ($status == "open")
                <h1 class="title is-size-3 has-text-weight-bold">Donatie in behandeling</h1>
                <p class="subtitle is-size-5">Uw betaling van €{{ $amount }} is nog in behandeling.</p>
                <button class="button is-primary mt-4" onclick="window.location.reload(true);">Verversen</button>
            @else
                <h1 class="title is-size-3 has-text-weight-bold">Betaling mislukt</h1>
                <p class="subtitle is-size-5">Er is iets misgegaan, de betaling kon helaas niet successvol worden voltooid.</p>
            @endif
        </div>
    </div>
@endsection
