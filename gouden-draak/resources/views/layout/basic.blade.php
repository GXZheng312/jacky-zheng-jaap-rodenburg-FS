@extends('layout.core.app')

@section('addCss')
	<link href="{{ asset('css/default.css') }}" rel="stylesheet">
@endsection


@section('body')
<div id='vue-app' class="chinese-container basic-font">
	<div class="ad-banner">
		<div class="dragon-logo">
			<img src="pictures/dragon-small.png" alt="Golden Dragon">
			<span>De Gouden Draak</span>
			<img src="pictures/dragon-small-flipped.png" alt="Golden Dragon">
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
			<img src="pictures/dragon-small.png" alt="Golden Dragon">
			<span>De Gouden Draak</span>
			<img src="pictures/dragon-small-flipped.png" alt="Golden Dragon">
		</div>
	</div>


	<div class="chinese-border">
        <div class="nav-container">
			<img src="pictures/dragon-small.png" alt="Golden Dragon">
            <div class="nav-menu-chinese">
                <div class="nav-title">
                    <span>Chinees Indische Specialiteiten</span>
                    <span>De Gouden Draak</span>     
                </div>
                <nav> 
                    <ul>
                        <li><a>Menukaart</a></li>
                        <li><a>Nieuws</a></li>
                        <li><a>Contact</a></li>
                    </ul>
                </nav>
            </div>
			<img src="pictures/dragon-small-flipped.png" alt="Golden Dragon">
		</div>
		<div class="content" >
            @yield('content')
        </div>
        <footer class="chinese-footer">
            <a href="paginas/contact_new.html">Naar Contact</a>
        </footer>
	</div>
</div>


@endsection