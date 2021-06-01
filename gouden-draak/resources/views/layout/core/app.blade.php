<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout.core.head')
    </head>
    <body>
        @yield('body')

        @include('layout.core.tail')
    </body>
</html>