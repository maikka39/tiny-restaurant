<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('css/township.css') }}" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1nd07N46BhYau8pzEAKTLCZ1cdV8iRsc&callback=myMap" defer></script>
    <script src="{{ asset('js/TownshipMap.js') }}" defer> </script>
    @stack('css')
</head>
<body>
    @yield('content')
</body>
</html>