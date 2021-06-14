<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>
    @if (trim($__env->yieldContent('title')))
        <h1>@yield('title')</h1>
    @else
        {{ config('constant.default_title') }}
    @endif
</title>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{-- @yield('addCss') --}}

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->
