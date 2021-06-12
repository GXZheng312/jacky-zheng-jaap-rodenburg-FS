@extends('layout.kassa')
@section('content')
<div class="container">
    <div>
        <a href="{{route('cashregister.gerecht.create')}}" class="btn btn-primary">Nieuw gerecht aanmaken</a>
    </div>
    <table class="table table-striped">
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
                        <a href="{{route('cashregister.gerecht.edit', ['gerecht' => $gerecht->id])}}" class="btn btn-warning">Aanpassen</a>
                        <a href="#" class="btn btn-danger">Verwijderen</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
