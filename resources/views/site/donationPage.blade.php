@extends("site.layouts.base", [
    "title" => $donationPage->title
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/donate.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/donate.js') }}" defer></script>
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
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h1 class="title is-size-3 has-text-weight-bold">{{ $donationPage->title }}</h1>
                <p class="subtitle is-size-5">{!! $donationPage->description !!}</p>
                @error("donation_error")
                    <div class="has-text-danger">{{ $message }}</div>
                @enderror
                <span id="donate-form-error" class="has-text-danger hidden"></span>
                <div class="amounts control">
                    @foreach($donationPage->donation_amounts->sortBy('position')->map(function ($obj) {return $obj->amount;}) as $amount)
                        <div>
                            <input id="radio-amount-{{$amount}}" type="radio" name="amount" value="{{$amount}}" class="amount radio">
                            <label for="radio-amount-{{$amount}}" class="amount label">
                                <span>Doneer &euro;{{ number_format($amount, 2) }}</span>
                            </label>
                        </div>
                    @endforeach
                    <div>
                        <input type="radio" name="amount" value="custom" id="custom-amount-radio" class="amount radio">
                        <label for="custom-amount-radio" class="amount label">
                            <span>Ander bedrag...</span>
                        </label>
                    </div>
                </div>
                <h2 class="title is-size-4 has-text-weight-bold">Kies zelf een bedrag</h2>
                <div class="custom-amount field">
                    <p class="control has-icons-left">
                        <input class="input" type="number" placeholder="Voer een bedrag in..." name="custom-amount" id="custom-amount-input">
                        <span class="icon is-small is-left">
                            &euro;
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button type="submit" class="button is-primary">
                            Doneer
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
