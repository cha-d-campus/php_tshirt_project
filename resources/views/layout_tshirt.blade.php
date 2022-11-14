<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer son T-shirt personnalisé</title>
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>--}}
    <!-- Scripts -->
    <script src="{{ ('js/app.js') }}" defer></script>
    <!-- Styles -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</body>
</html>
