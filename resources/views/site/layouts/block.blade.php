<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')
</head>
<body>
    @yield('content')
    @stack('scripts')
</body>
</html>