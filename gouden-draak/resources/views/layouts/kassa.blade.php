@extends('layouts.kassa.app')

@section('body')
    <div id='vue-app'>
        @include('layouts.kassa.navbar')
        @yield('content')
    </div>
@endsection
