<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $permalink = config('app.url') . rtrim("/" . ltrim(request()->path(), '/'), '/') . "/";
        $pagename = $title ?? config('app.name');
        $pagedescription = $description ?? "Welkom bij " . config('app.name');
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ url("/favicon.ico") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url("/apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url("/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url("/favicon-16x16.png") }}">
    <link rel="manifest" href="{{ url("/site.webmanifest") }}">
    <link rel="mask-icon" href="{{ url("/safari-pinned-tab.svg") }}" color="#eaffea">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">

    <link rel="canonical" href="{{ $permalink }}" />

    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title"
        content="{{ $pagename }}" />
    <meta property="og:description"
        content="{{ $pagedescription }}" />
    <meta property="og:url" content="{{ $permalink }}" />
    @isset($image)
    <meta property="og:image" content="{{ $image }}" />
    @endisset

    <meta itemprop="name" content="{{ $pagename }}">
    <meta itemprop="description" content="{{ $pagedescription }}">
    @isset($image)
    <meta itemprop="image" content="{{ $image }}"/>
    @endisset

    <meta name="twitter:card" content="summary_large_image" />
    @isset($image)
    <meta name="twitter:image" content="{{ $image }}" />
    <meta name="twitter:image:alt" content="{{ $image_alt ?? "Cover image" }}" />
    @endisset
    <meta name="twitter:title" content="{{ $pagename }}" />
    <meta name="twitter:description"
        content="{{ $pagedescription }}" />
    <meta name="twitter:url" content="{{ $permalink }}" />


    @stack('meta')


    <title>@isset($title){{ $title }} | @endisset{{ config('app.name') }}</title>

    {{--  Import Google Fonts  --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')

    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')

</head>
<body>
    <x-navbar />

    @yield('content')

    <x-footer />
</body>
</html>
