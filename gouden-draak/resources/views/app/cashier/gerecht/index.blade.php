@extends('layout.kassa')
@section('content')
<div class="container">
    <h1 class="mt-3"> Gerechten overzicht </h1>

    <div class="mt-3">
        <a href="{{route('cashregister.gerecht.create')}}" class="btn btn-outline-primary">Nieuw gerecht aanmaken</a>
    </div>
    <table class="table table-striped mt-3">
        <thead>
            <th>#</th>
            <th>Menunummer</th>
            <th>Menu toevoeging</th>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Soort</th>
            <th>Pittigheid</th>
            <th>Beschrijving</th>
            <th>Acties</th>  
        </thead>
        <tbody>
            @foreach ($gerechten as $gerecht)
                <tr>
                    <td>{{$gerecht->id}}</td>
                    <td>{{$gerecht->menunummer}}</td>
                    <td>{{$gerecht->menu_toevoeging}}</td>
                    <td>{{$gerecht->naam}}</td>
                    <td>{{$gerecht->prijs}}</td>
                    <td>{{$gerecht->soort_gerecht->soort}}</td>
                    <td>{{$gerecht->pittigheid->pittigheid}}</td>
                    <td>{{$gerecht->beschrijving}}</td>
                    <td>
                        <div class="btn-group-vertical">
                        <a href="{{route('cashregister.gerecht.edit', ['gerecht' => $gerecht->id])}}" class="btn btn-warning">Aanpassen</a>

                        {{ Form::open(['method'=>'DELETE', 'url' =>route('cashregister.gerecht.destroy', $gerecht->id)]) }}
                        {{ Form::button('verwijderen', ['type' => 'submit','class' => 'btn btn-danger','title' => 'Delete Post','onclick'=>'return confirm("Wilt u het zeker verwijderen?")']) }}
                        {{ Form::close() }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
