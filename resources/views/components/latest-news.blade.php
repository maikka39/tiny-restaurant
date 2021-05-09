<div class="news-items">
    <h2>Laatste nieuws</h2>

    @forelse ($news as $item)
        @php $image = $item->imagesAsArrays('cover', 'flexible')[0] ?? null; @endphp

        <div class="news-item">
            <div class="image">
                @if ($image)
                    <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
                @endif
            </div>

            <div class="text">
                <h3>{{ $item->title }}</h3>
                <div class="summary">
                    {{ $item->summary }}
                </div>
                <a class="button primary more" href="{{ route('newsItems.show') }}">Lees meer</a>
            </div>
        </div>
    @empty
        <p>Er is geen nieuws!</p>
    @endforelse
</div>
