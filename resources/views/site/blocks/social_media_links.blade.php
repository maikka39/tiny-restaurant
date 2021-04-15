<div class="flex justify-between items-center lg:w-3/6 text-lg">
    @foreach($block->children as $child)
        <a class="px-4 flex-col justify-center" href="{{ $child->input('link') }}" style="color: {{ $child->input('logo_color') }}">
            <i class="{{ $child->input('logo') }} h-full socialmedia-logo" ></i>
            <span class="sr-only">{{ $child->input('logo') }}</span>
        </a>
    @endforeach
</div>