<div class="block">
    <h2 class="title is-size-1 has-text-weight-normal">Trotse partners van het Tiny Restaurant</h2>
    <p class="subtitle is-size-3 mt-3">Dit zijn de partners die er voor zorgen dat wij er kunnen zijn voor onze mooie samenlevingen!</p>
</div>

@foreach ($partners->chunk(4) as $chunk)
    <div class="columns is-vcentered">
        @foreach ($chunk as $partner)
            @php
                $image = $partner->image('image', 'desktop');
                $alt = $partner->imageAltText('image');
            @endphp
            
            <div class="column">
                <figure>
                    <img width="150" src="{{ $image }}" alt="{{ $alt }}" onclick="togglePartnerPopup(this.parentElement.getElementsByClassName('form-popup')[0])">
                </figure>
            </div>
        @endforeach
    </div>
@endforeach
