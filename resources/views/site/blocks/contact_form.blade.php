<div>
    <h1>{{ $block->input('title') }}</h1>
    <p>{{ $block->input('description') }}</p>
    <form method="POST" action="/contact">
        @csrf
        <div>
            <label for="name">
                Naam
            </label>
            <input id="name" type="text" placeholder="Uw naam">
        </div>
        <div>
            <label for="email">
                E-mail
            </label>
            <input id="email" type="email" placeholder="voorbeeld@email.com">
        </div>
        <div>
            <label for="message">
                Message
            </label>
            <textarea
                    id="message"></textarea>
        </div>
        <div>
            <button
                    type="button">
                Send
            </button>
        </div>
    </form>
</div>