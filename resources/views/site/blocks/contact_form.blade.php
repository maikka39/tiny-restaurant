<div class="w-container mx-auto mb-5">
    <div class="hero grid md:grid-cols-5">
        <div class="pl-12 md:col-span-3 md:mt-32">
            <div class="content">
                <h1>Contact</h1>
                <p class="mb-2">E-mail ons met eventuele vragen of verzoeken of bel ons via 06-20466555. Wij beantwoorden graag uw vragen en/of maken een afspraak met u!</p>
            </div>
        </div>
    </div>
</div>

<div class="box">
    <div class="w-container mx-auto">
        <h3 class="pl-4">{{ $block->input('title') }}</h3>
        <p class="pl-5">{{ $block->input('description') }}</p>

        <form method="POST" action="{{ route('contact.sendMail') }}">
            @csrf

            <div class="field">
                <label class="label" for="name">Naam</label>
                <div class="control has-icons-left">
                    <input class="input is-rounded" id="name" type="text" name="name" value="{{ old("name") }}" placeholder="Naam" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="field">
                <label class="label" for="email">E-mailadres</label>
                <div class="control has-icons-left">
                    <input class="input is-rounded" id="email" type="email" name="email" value="{{ old("email") }}" placeholder="E-mailadres" required>
                    <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                </div>
            </div>

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="field">
                <label class="label" for="message">Bericht</label>
                <div class="control">
                    <textarea class="textarea has-fixed-size" id="message" name="message" placeholder="Bericht" required>{{ old("message") }}</textarea>
                </div>
            </div>

            @error('message')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="field">
                <label class="label" for="project">(Optioneel) Selecteer een project</label>
                <div class="control select is-rounded">
                    <select id="project" name="project">
                        <option selected disabled>Selecteer een project</option>
                        @foreach($projectList as $project)
                            <option>{{$project->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {!! NoCaptcha::display() !!}

            @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif

            <div class="control">
                <button class="button is-primary">Verstuur bericht</button>
            </div>

            @if (session('success_message'))
                <p>{{ session('success_message') }}</p>
            @endif
        </form>
    </div>
</div>

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush