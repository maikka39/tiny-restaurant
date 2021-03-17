@extends('layouts.base')

@section('content')
    <h1>{{ $item->name }}</h1>
    {!! $item->description !!}<br/>
    {!! $item->address !!}<br/>
    <img src="{{ $item->image("farmer_profile", 'desktop') }}" alt="{{ $item->imageAltText("farmer_profile") }}"/><br/>

    {!! $item->renderBlocks(false) !!}
@endsection
