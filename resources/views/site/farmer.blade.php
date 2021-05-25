@extends('site.layouts.base', [
    'title' => $item->title
])

@section('content')
    <section class="section">
        <div class="is-flex">
            @php($image = $item->imageAsArray('farmer_profile', 'flexible'))
            <img src="{{ $image ? $image['src'] : asset('img/news-placeholder.png') }}" alt="{{ $image ? $image['alt'] : 'news placeholder' }}">
            <div>
                <h2>{{ $item->name }}</h2>
                <p>{{ $item->summary }}</p>
                <hr>
                <small>{{ $item->name }} is al x dagen lid by het Tiny Restaurant!</small>
            </div>
        </div>
    </section>
@endsection
