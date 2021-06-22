<h2 class="title is-size-1 has-text-weight-normal">Het laatste nieuws van het Tiny Restaurant</h2>
            
<div class="columns">
    @forelse ($news as $item)
        @php $image = $item->imagesAsArrays('cover', 'flexible')[0] ?? null; @endphp

        <div class="column">
            <div class="news-item">
                <div class="block">
                    <figure class="image is-2by1">
                        @if ($image)
                            <img class="news-image" src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
                        @else
                            <img class="news-image" src="{{ asset('img/news-placeholder.png') }}" alt="news-placeholder image">
                        @endif
                    </figure>
                </div>
                
                
                <div class="block news-item-content">
                    <h3 class="is-size-4 has-text-weight-bold">{{ $item->title }}</h3>
                    <p class="content">{{ $item->summary }}</p>
                    <div>
                        <a class="has-text-weight-bold" href="{{ route('newsItems.show') }}">Bekijk nieuws</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="column">
            <p>Er is geen nieuws!</p>
        </div>
    @endforelse
</div>
