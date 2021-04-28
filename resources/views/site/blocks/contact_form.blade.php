<div class="">
    <div class="w-container bg-white mx-auto">
        <h3 class="pl-10 pt-5">{{ $block->input('title') }}</h3>
        <p class="pl-20">{{ $block->input('description') }}</p>

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
                <textarea class="resize-none" cols="30" rows="10" id="message" name="message" placeholder="Bericht" required>{{ old("message") }}</textarea>
                <label>Bericht</label>
            </div>

            @error('message')
                <div class="error">{{ $message }}</div>
            @enderror

            <button class="button" type="submit">Verstuur bericht</button>

            @if (session('success_message'))
                <p class="success">
                    {{ session('success_message') }}
                </p>
            @endif
        </form>
    </div>
</div>