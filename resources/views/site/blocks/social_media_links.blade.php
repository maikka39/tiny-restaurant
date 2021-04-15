<div class="flex justify-between items-center text-lg">
    @foreach($block->children as $child)
        <a class="px-4 flex-col justify-center" href="{{ $child->input('link') }}"> <!-- phone number of Krista -->
            <i class="{{ $child->input('logo') }}"></i>
            <span class="sr-only">{{ $child->input('logo') }}</span>
        </a>
    @endforeach
</div>