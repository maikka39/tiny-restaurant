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

        <form class="px-5" method="POST" action="{{ route('contact.sendMail') }}">
            @csrf

            <div class="field input">
                <input id="name" type="text" name="name" value="{{ old("name") }}" placeholder="Naam" required>
                <label>Naam</label>
            </div>

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="field input">
                <input id="email" type="email" name="email" value="{{ old("email") }}" placeholder="E-mailadres" required>
                <label>E-mailadres</label>
            </div>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="field input">
                <textarea class="contact-message" cols="30" rows="10" id="message" name="message" placeholder="Bericht" required>{{ old("message") }}</textarea>
                <label class="pl-1">Bericht</label>
            </div>

            @error('message')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="field input">
                <select id="project" name="project">
                    <option selected disabled>Selecteer een project</option>
                    @foreach($projectList as $project)
                        <option>{{$project->name}}</option>
                    @endforeach
                </select>
            </div>

            @if (session('success_message'))
                <p class="contact-success-button">
                    {{ session('success_message') }}
                </p>
            @endif
        </form>
    </div>
</div>

@push('scripts')
{{----}}
@endpush