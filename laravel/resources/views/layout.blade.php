<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    {{-- Scala inicial sea el 100% , el ancho sea el ancho del dispositivo
    --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- defer: se ejecutará al final de la carga --}}
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    {{--
        d-flex: elementos juntos
        flex-column: de forma vertical
        h-screen: ocupe todo el alto de la pantalla
        justify-content-between: espacio entre cada elemento
        --}}
    <div
        id="app"
        class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials/nav')
            @include('partials.session-status')
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-white text-center text-black-50 py-3 shadow">
            {{ config('app.name') }} | Copyright @ 2021
        </footer>
    </div>
</body>

</html>
