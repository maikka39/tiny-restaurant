<div class="p-2 mx-2">
    <h1 class="text-2xl">{{ $block->input('title') }}</h1>
    <div class="relative w-full h-80">
        <div class="overflow-hidden bg-none w-full h-full">
            <iframe class="w-full h-full m-0 border-none overflow-hidden"
                src="https://maps.google.com/maps?q={{ $block->input('address') }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>
    </div>
</div>