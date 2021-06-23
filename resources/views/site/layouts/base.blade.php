<!DOCTYPE html>
<html lang="nl">
<head>
    @php
        $permalink = config('app.url') . rtrim("/" . ltrim(request()->path(), '/'), '/') . "/";
        $pagename = isset($title) ? strip_tags($title) : config('app.name');
        $pagedescription = isset($description) ? strip_tags($description) : "Welkom bij " . config('app.name');
        $keywords = "tiny-restaurant tinyrestaurant boeren ontour on-tour" . rtrim(" " . ($pagekeywords ?? "")) . rtrim(" " . (isset($page) ? $page->keywords : ""));
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

    <meta name="author" content="{{ config('app.name') }}">
    <meta name="description" content="{{ $pagedescription }}" />
    <meta name="keywords" content="{{ $keywords }}" />
    <meta name="robots" content="noodp" />

    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:type" content="{{ $pagetype ?? "website" }}" />
    <meta property="og:title" content="{{ $pagename }}" />
    <meta property="og:description" content="{{ $pagedescription }}" />
    <meta property="og:url" content="{{ $permalink }}" />
    @isset($image)
    <meta property="og:image" content="{{ $image["src"] }}" />
    <meta property="og:image:width" content="{{ $image["width"] }}" />
    <meta property="og:image:height" content="{{ $image["height"] }}" />
    @endisset

    <meta property="article:publisher" content="{{ config('app.url') }}" />
    <meta name="article:author" content="{{ config('app.name') }}">

    @isset($pagecreatedtime)
    <meta property="article:published_time" content="{{ $pagecreatedtime }}" />
    @endisset

    @isset($pagemodifiedtime)
    <meta property="article:modified_time" content="{{ $pagemodifiedtime }}" />
    @endisset

    @isset($page)
    @isset($page->category)
    <meta property="article:section" content="{{ $page->category }}" />
    @endisset
    @endisset
    <meta property="article:tag" content="{{ $keywords }}" />

    <meta itemprop="name" content="{{ $pagename }}">
    <meta itemprop="description" content="{{ $pagedescription }}">
    @isset($image)
    <meta itemprop="image" content="{{ $image["src"] }}"/>
    @endisset

    <meta name="twitter:card" content="summary_large_image" />
    @isset($image)
    <meta name="twitter:image" content="{{ $image["src"] }}" />
    <meta name="twitter:image:alt" content="{{ $image["alt"] ?? "Cover image" }}" />
    @endisset
    <meta name="twitter:title" content="{{ $pagename }}" />
    <meta name="twitter:description" content="{{ $pagedescription }}" />
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
