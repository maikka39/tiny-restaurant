@extends('site.layouts.base', [
    'title' => $item->title,
    'header' => true,
    'featured' => $item->image('featured', 'desktop')
])

@section('content')
    {!! $item->description !!}
    {!! $item->renderBlocks(false) !!}
@endsection
