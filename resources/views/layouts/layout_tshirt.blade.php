<!-- create.blade.php -->
@extends('headers.header')

@section('mainlayout')
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</body>
</html>

@endsection
