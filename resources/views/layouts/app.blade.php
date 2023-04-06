<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.parts.head')
<body>
<div id="app">
    @include('layouts.parts.navbar')

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
