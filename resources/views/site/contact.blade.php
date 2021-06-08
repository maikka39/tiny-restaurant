@extends("site.layouts.base", [
    "title" => "Contact",
    "description" => "Neem gerust contact met ons op!",
])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section("content")
<div class="box">
    <div class="columns">
        <div class="column is-full"></div>
    </div>
    <div class="columns is-flex">
        <div class="column is-hidden-mobile"></div>
        <div class="column is-two-fifths main-text is-hidden-mobile">
            <h1 class="title contact-text has-text-weight-medium is-size-1">
                Neem gerust contact met ons op!
            </h1>
        </div>
        <div class="column block is-two-fifths">
            <div class="background"></div>
            <div class="foreground">
                <form class="control" method="POST" action="{{ route('contact.sendMail') }}">
                    @csrf
                    <h1 class="title mt-5 mb-5">Contact</h1>

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
                                        <option
                                            value="{{ $project->name }}"
                                            {{ (old("project") == $project->name ? "selected":"") }}
                                            @if(request()->has('project') && request()->get('project') === $project->name) selected @endif
                                        >{{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {!! NoCaptcha::display()!!}

                    @error('g-recaptcha-response')
                    <div class="has-text-danger">{{ $message }}</div>
                    @enderror

                    <button class="button is-primary mt-5 mobile-button" type="submit">Verstuur Bericht</button>

                    @if (session('success_message'))
                        <p class="has-text-success">{{ session('success_message') }}</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="columns mt-5">
        <div class="column is-full"></div>
    </div>
</div>
@endsection

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush