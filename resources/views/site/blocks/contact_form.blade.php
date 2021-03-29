<div class="my-4">
    <h3>{{ $block->input('title') }}</h3>
    <p class="my-2">{{ $block->input('description') }}</p>

    <form class="p-4 shadow-lg border" method="POST" action="{{ route('contact.sendMail') }}">
        @csrf

        <div class="pb-2 lg">
            <label for="name">Naam</label>
            <input id="name" type="text" name="name" value="{{ old("name") }}" placeholder="Jan Jansen">

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="py-2 block">
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old("email") }}" placeholder="voorbeeld@email.nl">

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="py-2">
            <label for="message">Bericht</label>
            <textarea class="resize-vertical" rows="10" id="message" name="message">{{ old("message") }}</textarea>

            @error('message')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button class="button" type="submit">Verstuur</button>
            
            @if (session('success_message'))
                <p class="success">
                    {{ session('success_message') }}
                </p>
            @endif
        </div>
    </form>
</div>