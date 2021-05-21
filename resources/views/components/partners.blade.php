<div class="partners homepage">
    <h2>Partners</h2>
    <div class="flex-container slideshow">
        <div class="slideshow-container">
            @foreach($partners as $child)
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

        <div class="slideshowdots">
        </div>
    </div>
    <div class="flex flex-row flex-wrap justify-around content-around partner-list">
        @foreach($partners as $child)
            <div class="w-1/5 m-4">
                <div class="form-popup" onclick="event.target === this ? togglePartnerPopup(this) : () => {}">
                    <div class="modal lg:max-w-6xl">
                        <h2>{{$child->name}}</h2>
                        <p>{!!$child->description!!}</p>
                        <button class="close" onclick="togglePartnerPopup(this.parentElement.parentElement)"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}" class="rounded-3xl cursor-pointer" onclick="togglePartnerPopup(this.parentElement.getElementsByClassName('form-popup')[0])">
            </div>
        @endforeach
    </div>
</div>
