@extends('layout.kassa')
@section('content')
        <div class="row">
            <div class="col">
                <div class="gerecht-list">
                    <h1 class="h1">Gerechten</h1>
                    <gerecht-list></gerecht-list>
                </div>
            </div>
            <div class="col">
                <div class="gerecht-list">
                    <h1 class="h1">Winkelmandje</h1>
                    <gerecht-list></gerecht-list>
                </div>
            </div>
        </div>
@endsection
