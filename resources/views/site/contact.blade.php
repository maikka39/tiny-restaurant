@extends('site.layouts.base', [
    "title" => "Contact"
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section("content")
<div class="box">
    <div class="columns mt-3">
        <div class="column is-full"></div>
    </div>
    <div class="columns is-flex">
        <div class="column is-three-fifths main-text is-hidden-mobile">
            <h1 class="title contact-text has-text-weight-medium">
                Neem gerust contact met ons op!
            </h1>
        </div>
        <div class="column mr-5 mt-5 is-one-third form-shadow">
                <form class="control" method="POST" action="{{ route('contact.sendMail') }}" id="contactform">
                    @csrf
                    <h1 class="title mt-5 mb-5 has-text-centered">Contact</h1>

                    <div class="columns">
                        <div class="column">
                            <div class="control">
                                <label for="firstname" class="sr-only">Voornaam</label>
                                <input class="input" id="firstname" type="text" name="firstname" value="{{ old("firstname") }}" placeholder="Voornaam" required>
                                @error('firstname')
                                <div class="has-text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="column is-three-fifths">
                            <label for="lastname" class="sr-only">Achternaam</label>
                            <input class="input" id="lastname" type="text" name="lastname" value="{{ old("lastname") }}" placeholder="Achternaam" required>
                            @error('lastname')
                            <div class="has-text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-full">
                            <div class="control">
                                <label for="email" class="sr-only">Email</label>
                                <input class="input" id="email" type="email" name="email" value="{{ old("email") }}" placeholder="E-mailadres" required>
                                @error('email')
                                <div class="has-text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-full">
                            <div class="control">
                                <label for="message" class="sr-only">Bericht</label>
                                <textarea class="textarea has-fixed-size" id="message" name="message" placeholder="Bericht" required>{{ old("message") }}</textarea>
                                @error('message')
                                <div class="has-text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <span class="icon-text">
                <label class="label has-icons-right" for="project">Optioneel</label>
                <span class="icon is-right">
                        <i class="far fa-question-circle"></i>
                    </span>
            </span>

                    <div class="columns">
                        <div class="column">
                            <div class="control select">
                                <select id="project" name="project">
                                    <option selected disabled>Selecteer een project</option>
                                    @foreach($projectList as $project)
                                        <option>{{$project->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {!! NoCaptcha::display()!!}

                    <button class="button is-primary mt-5" type="submit">Verstuur Bericht</button>


                    @error('g-recaptcha-response')
                    <div class="has-text-danger">{{ $message }}</div>
                    @enderror

                    @if (session('success_message'))
                        <p class="has-text-success">{{ session('success_message') }}</p>
                    @endif
                </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush