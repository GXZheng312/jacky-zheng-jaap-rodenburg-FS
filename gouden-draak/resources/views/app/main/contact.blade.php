@extends('layouts.basic')

@section('content')
    <div class="text-center p-3 fs-5 fw-bold">
        <p class="mb-3 mt-2">
            De Gouden Draak is eenvoudig te vinden, vlak bij het centrum, 5 minuten lopen achter het centraal station.
        </p>
        <p>
            Onderwijsboulevard 215, kamer OG112 <br />
            5223 DE 's-Hertogenbosch
        </p>
    </div>
    <div class="w-100 border">
        <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0"
            marginwidth="0"
            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=nl&amp;q=Onderwijsboulevard%20215,+(Mijn%20bedrijfsnaam)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"/>
    </div>
@endsection
