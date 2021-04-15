@push('styles')
    <link href="{{ asset('css/slideshow.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{asset('js/slideshow.js')}}" defer></script>
@endpush

<div class="flex-container">
    <div class="slideshow-container">
        @foreach($block->children as $child)
            {{-- <h1>{{$child->input('name')}}</h1>
            <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}">
            <p>{!!$child->input('description')!!}</p> --}}

            <div class='mySlides'>
                <div class="imgholder">
                    <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}">
                </div>
                <div class='slidetextbox'>
                    <h4>{{$child->input('name')}}</h4>
                    <p>{!!$child->input('description')!!}</p>
                    {{-- <a href='{{ route('farmer.show', $farmer->slug) }}' class='button primary '> Lees meer </a> --}}
                </div>
            </div>
        @endforeach

        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>
    </div>
    <br>

    <div id='slideshowdots'>
    </div>
</div>
<div class="flex flex-row flex-wrap justify-around content-around">
    @foreach($block->children as $child)
        <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}" class="w-1/5 rounded-3xl m-4">
    @endforeach
</div>