@push('styles')
    <link href="{{ asset('css/slideshow.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{asset('js/slideshow.js')}}" defer></script>
@endpush

<div class="flex-container">
    <div class="slideshow-container">
        @foreach($block->children->shuffle() as $child)
            <div class='mySlides'>
                <div class="imgholder">
                    <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}">
                </div>
                {{-- <div class='slidetextbox flex-col'>
                    <h4>{{$child->input('name')}}</h4>
                    <p>{!!$child->input('description')!!}</p>
                </div> --}}
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
        <div class="w-1/5 m-4">
            <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}" class="rounded-3xl">
        </div>
    @endforeach
</div>