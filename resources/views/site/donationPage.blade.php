@extends("site.layouts.base", [
    "title" => $donationPage->title
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
            <form id="donate-form" action="#">
                <h1 class="title is-size-3 has-text-weight-bold">{{ $donationPage->title }}</h1>
                <p class="subtitle is-size-5">{{ $donationPage->description }}</p>
                <div class="amounts control">
                    @foreach($donationPage->donation_amounts->sortBy('position')->map(function ($obj) {return $obj->amount;}) as $amount)
                        <label class="amount radio">
                            <input type="radio" name="amount" value="{{$amount}}">
                            <span>Doneer €{{$amount}}</span>
                        </label>
                    @endforeach
                    <label class="amount radio">
                        <input type="radio" name="amount" value="custom">
                        <span>Ander bedrag...</span>
                    </label>
                </div>
            </form>
        </div>
    </div>
@endsection
