<div class="flex justify-between items-center text-lg">
    @foreach($block->children as $child)
        <h1>{{$child->input('name')}}</h1>
        <img src="{{$child->image('image', 'desktop')}}" alt="{{$child->imageAltText('image')}}">
        <p>{{$child->input('description')}}</p>
    @endforeach
</div>
