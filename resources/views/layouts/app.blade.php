<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts._head')
</head>
<body>
<div id="app">
    @include('layouts._navbar')

    <main class="py-4" style="padding-top: 4.25rem !important;">
        @yield('content')
    </main>
</div>
</body>
</html>
