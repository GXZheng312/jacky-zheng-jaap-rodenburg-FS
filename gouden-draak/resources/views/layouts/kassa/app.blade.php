<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.basic.head')
</head>
<body style="margin: 0 !important; padding: 0; !important;">
@include('layouts.kassa.navbar')
@yield('body')

@include('layouts.basic.tail')
</body>
</html>
