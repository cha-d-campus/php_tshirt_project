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
{{--    <!-- CSS only -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">--}}
    <!-- Styles -->
    @vite(['resources/js/app.js'])
</head>
<body>

<nav class="navbar bg-light px-5 pt-3">
    <div class="container-fluid">
        <a class="navbar-brand fs-2 mx-3" href="/">
            <img src="../storage/img/logo/Logo.png" alt="Logo" width="65" height="auto" class="d-inline-block align-text-bottom">
            Custom'|T
        </a>
        <ul class="nav pl-3 pt-3 fs-4">
            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('tshirt.create') }}">Créer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('tshirt.index') }}">Voir ma liste</a>
            </li>
        </ul>
    </div>
</nav>
<div class="hr-nav mx-5">
</div>

@yield('mainlayout')
