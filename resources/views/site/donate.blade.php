@extends("site.layouts.base", [
    "title" => 'Doneren'
])

@push('styles')
    <link href="{{ asset('css/donate.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{asset('js/donate.js')}}"></script>
@endpush

@section("content")
<div class="donate w-container mx-auto mb-5">
    <h1>Doneren</h1>
    <div class="container">
        <div class="info">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam dolorum illo voluptatibus delectus qui quia natus nobis. Consequatur quo earum a velit accusantium dicta quam, tempore itaque totam. Vel, ea.
        </div>
        <form id="pay-form" class="pay-container" method="post" action="{{ route('donation.new') }}">
            <h2>Steun het Tiny Restaurant</h2>
            <div class="prices">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <label>€3
                    <input name="amount" type="radio" value="3">
                </label>
                <label>€5
                    <input name="amount" type="radio" value="5">
                </label>
                <label>€10
                    <input name="amount" type="radio" value="10">
                </label>
                <label>€20
                    <input name="amount" type="radio" value="20">
                </label>
                <label>Ander bedrag
                    <input name="amount" type="radio" value="custom">
                </label>
                <label>
                    <input name="custom_amount" type="number" placeholder="Bedrag">
                </label>
                <button type="submit">Bevestigen</button>
            </div>
        </form>
    </div>
</div>
@endsection
