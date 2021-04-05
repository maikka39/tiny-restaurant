<div>
    <img class="box-border sm:w-11/12 md:w-1/3 p-5 float-{{ $block->input('image-location') }}" src="{{ $block->image('image', 'desktop') }}" alt="{{ $block->imageAltText('image') }}">
    <div class="box-border p-2">
        <p>
            {!! $block->input('text') !!}
        </p>
    </div>
    <div class="clear-both"></div>
</div>