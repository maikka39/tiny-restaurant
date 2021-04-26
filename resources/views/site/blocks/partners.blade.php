@push('styles')
    <link href="{{ asset('css/slideshow.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{asset('js/partners.js')}}" defer></script>
@endpush

<div class="flex-container">
    <div class="slideshow-container">
        @foreach($block->children->shuffle() as $child)
            <div class='mySlides'>
                <div class="imgholder">
                    <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}">
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
<div class="flex flex-row flex-wrap justify-around content-around partner-list">
    @foreach($block->children as $child)
        <div class="form-popup" onclick="event.target === this ? togglePartnerPopup(this) : console.log(1)">
            <div class="modal">
                <h2>{{$child->input('name')}}</h2>
                <p>{!!$child->input('description')!!}</p>
                <button class="close" href="#" onclick="togglePartnerPopup(this.parentElement.parentElement)">X</button>
            </div>
        </div>
        <div class="w-1/5 m-4">
            <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}" class="rounded-3xl cursor-pointer" onclick="togglePartnerPopup(this.parentElement.parentElement.getElementsByClassName('form-popup')[0])">
        </div>
    @endforeach
</div>