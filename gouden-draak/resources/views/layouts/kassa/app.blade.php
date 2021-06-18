<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.basic.head')
</head>
<body class="cashier-web">
    @yield('body')

    @include('layouts.basic.tail')

</body>
</html>
