<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    <div class="container">
        @yield('content')
    </div>
    <x-footer />
</body>
</html>
