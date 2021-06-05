@extends('layout.kassaLayout.app')


@section('body')
    <style>
        body {
            background-color: white !important;
        }
    </style>
    <div id='vue-app'>
        @yield('content')
    </div>
@endsection
