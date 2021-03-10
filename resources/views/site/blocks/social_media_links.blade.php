<div class="flex justify-between items-center">
    @foreach($block->children as $child)
        <a class="px-4 flex-col justify-center" href="{{ $child->input('link') }}" style="color: {{ $child->input('logo_color') }}"> <!-- phone number of Krista -->
            <i class="{{ $child->input('logo') }}"></i>
            <span class="sr-only">Telefoon</span> {{-- TODO future translation --}}
        </a>
    @endforeach
</div>