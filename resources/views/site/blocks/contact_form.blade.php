<div class="p-2 mx-2">
    <h1 class="text-4xl">{{ $block->input('title') }}</h1>
    <p class="my-2">{{ $block->input('description') }}</p>
    <form class="p-2 pl-4 bg-gray-200" method="POST" action="{{ route('contact.sendMail') }}">
        @csrf
        <div class="pb-2 lg">
            <label class="text-xl block" for="name">
                Naam
            </label>
            <input class="p-1 rounded w-full block border border-gray-500" id="name" type="text" name="name" value="{{ old("name") }}" placeholder="Uw naam">
            @error('name')
            <div class="text-red-500 text-xs"> {{ $message }}</div>
            @enderror
        </div>
        <div class="py-2 block">
            <label class="text-xl block" for="email">
                E-mail
            </label>
            <input class="p-1 rounded block w-full border  border-gray-500" id="email" type="email" name="email" value="{{ old("email") }}" placeholder="voorbeeld@email.com">
            @error('email')
            <div class="text-red-500 text-xs"> {{ $message }}</div>
            @enderror
        </div>
        <div class="py-2">
            <label class="text-xl block" for="message">
                Bericht
            </label>
            <textarea class="p-1 rounded w-full block border border-gray-500 resize-vertical" rows="10" id="message" name="message">{{ old("message") }}</textarea>
            @error('message')
            <div class="text-red-500 text-xs"> {{ $message }}</div>
            @enderror
        </div>
        <div class="py-3">
            <button class="px-2 rounded text-lg text-white border border-green-900 bg-green-700" type="submit">
                Verstuur
            </button>
            @if (session('success_message'))
                <p class="text-green-500 text-xs mt-2">
                    {{ session('success_message') }}
                </p>
            @endif
        </div>
    </form>
</div>