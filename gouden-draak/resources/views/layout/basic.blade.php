@extends('layout.core.app')

@section('addCss')
	<link href="{{ asset('css/default.css') }}" rel="stylesheet">
@endsection


@section('body')
<div class="chinese-container basic-font">
	<div class="ad-banner">
		<div class="dragon-logo">
			<img src="images/dragon-small.png" alt="Golden Dragon">
			<span>De Gouden Draak</span>
			<img src="images/dragon-small-flipped.png" alt="Golden Dragon">
		</div>
		<div class="scroll-banner">
			<a href="paginas/aanbiedingen.html">
				<div class="marquee">
					<p>
						Welkom bij De Gouden Draak. Klik op deze tekst om de aanbiedingen van deze week te zien!
					</p>
				</div>
			</a>
		</div>
		<div class="dragon-logo">
			<img src="images/dragon-small.png" alt="Golden Dragon">
			<span>De Gouden Draak</span>
			<img src="images/dragon-small-flipped.png" alt="Golden Dragon">
		</div>
	</div>

	<div class="chinese-border">
        <div class="nav-container">
			<img src="images/dragon-small.png" alt="Golden Dragon">
            <div class="nav-menu-chinese">
                <div class="nav-title">
                    <span>Chinees Indische Specialiteiten</span>
                    <span>De Gouden Draak</span>     
                </div>
                <nav>
					<ul>
						<li> <a href="{{ route('main.index')}}">Home</a> </li>
						<li> <a href="{{ route('main.menu')}}">Menu kaart</a> </li>
						<li> <a href="{{ route('main.news')}}">Nieuws</a> </li>
						<li> <a href="{{ route('main.contact')}}">Contact</a> </li>
					</ul>
				</nav>
            </div>
			<img src="images/dragon-small-flipped.png" alt="Golden Dragon">
		</div>
		<div id='vue-app' class="content" >
            @yield('content')
        </div>
        <footer class="chinese-footer">
            <a href="{{ route('main.contact')}}">Naar Contact</a>
        </footer>
	</div>
</div>


@endsection