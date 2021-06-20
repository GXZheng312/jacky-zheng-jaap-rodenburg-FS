@extends('layouts.kassa')
@section('content')
<div class="container">
    <h1 class="mt-3"> Gerechten overzicht </h1>

    <div class="mt-3">
        <a href="{{route('cashregister.gerecht.create')}}" class="btn btn-outline-primary">Nieuw gerecht aanmaken</a>
    </div>
    <gerechten-table></gerechten-table>
</div>
@endsection
