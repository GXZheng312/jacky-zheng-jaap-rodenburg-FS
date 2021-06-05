<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layout.core.head')
</head>
<body style="margin: 0 !important; padding: 0; !important;">
@include('layout.kassaLayout.navbar')
@yield('body')

@include('layout.core.tail')
</body>
</html>
