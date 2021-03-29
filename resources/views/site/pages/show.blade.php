@extends('site.layouts.base', [
    'title' => $item->title
])

@section('content')
    <h1>{{ $item->title }}</h1>
    {!! $item->description !!}

    {!! $item->renderBlocks(false) !!}
@endsection
