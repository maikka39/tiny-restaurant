@extends('site.layouts.base', [
    'title' => $news->title
])

@section('content')
    <section class="section">
        <div>
             {!! $news->description !!}
        </div>
    </section>
@endsection