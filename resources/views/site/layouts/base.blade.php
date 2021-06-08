<!DOCTYPE html>
<html lang="en">
<head>
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

    @stack('meta')

    <link rel="canonical" href="{{ config('app.url') . rtrim("/" . ltrim(request()->path(), '/'), '/') . "/"}}" />

    <title>@isset($title){{ $title }} | @endisset{{ env('APP_NAME') }}</title>

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
