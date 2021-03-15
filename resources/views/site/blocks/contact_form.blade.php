<div class="p-2 mx-2">
    <h1 class="text-4xl">{{ $block->input('title') }}</h1>
    <p class="my-2">{{ $block->input('description') }}</p>
    <form class="p-2 pl-4 bg-gray-200" method="POST" action="/contact">
        @csrf
        <div class="pb-2 lg">
            <label class="text-xl block" for="name">
                Naam
            </label>
            <input class="p-1 rounded w-full block border border-gray-500" id="name" type="text" placeholder="Uw naam">
        </div>
        <div class="py-2 block">
            <label class="text-xl block" for="email">
                E-mail
            </label>
            <input class="p-1 rounded block w-full border  border-gray-500" id="email" type="email" placeholder="voorbeeld@email.com">
        </div>
        <div class="py-2">
            <label class="text-xl block" for="message">
                Bericht
            </label>
            <textarea class="p-1 rounded w-full block border  border-gray-500" id="message"></textarea>
        </div>
        <div class="py-3">
            <button class="px-2 rounded text-lg text-white border border-green-900 bg-green-700" type="button">
                Vestuur
            </button>
        </div>
    </form>
</div>