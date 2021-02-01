<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- defer: se ejecutará al final de la carga --}}
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    @include('partials/nav')
    @include('partials.session-status')
    @yield('content')
</body>

</html>
