@extends('layouts.basic.app')

@section('addCss')
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
@endsection

@section('body')
    <div class="chinese-container basic-font">
        <div class="ad-banner">
            <div class="dragon-logo">
                <img src="/images/dragon-small.png" alt="Golden Dragon">
                <span>De Gouden Draak</span>
                <img src="/images/dragon-small-flipped.png" alt="Golden Dragon">
            </div>
            <div class="scroll-banner">
                <a href="{{route('main.aanbieding')}}">
                    <div class="marquee">
                        <p>
                            Welkom bij De Gouden Draak. Klik op deze tekst om de aanbiedingen van deze week te zien!
                        </p>
                    </div>
                </a>
            </div>
            <div class="dragon-logo">
                <img src="/images/dragon-small.png" alt="Golden Dragon">
                <span>De Gouden Draak</span>
                <img src="/images/dragon-small-flipped.png" alt="Golden Dragon">
            </div>
        </div>

        <div class="chinese-border">
            <div id='vue-app'>
                <div class="nav-container">
                    <img src="/images/dragon-small.png" alt="Golden Dragon">
                    <div class="nav-menu-chinese">
                        <div class="nav-title">
                            <span>Chinees Indische Specialiteiten</span>
                            <span>De Gouden Draak</span>
                        </div>
                        <navbar></navbar>
                    </div>
                    <img src="/images/dragon-small-flipped.png" alt="Golden Dragon">
                </div>
                <div class="content">
                    @yield('content')
                </div>
            </div>
            <footer class="chinese-footer">
                <a href="{{ route('main.contact')}}">Naar Contact</a>
            </footer>
        </div>
    </div>


@endsection
