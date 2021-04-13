<div class="relative flex">
    <img class="flex flex-grow" src="{{ $block->image('image', 'desktop') }}" alt="{{ $block->imageAltText('image') }}">

    @if($block->input('description'))
        <div class="bg-white p-1 absolute top-1/2 right-1/3">
            {{ $block->input('description') }}
        </div>
    @endif
</div>
