@extends('layouts.basic')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <h1 class="h1 mb-3 mt-3">Bedankt voor uw order bij de Goudendraak</h1>
                {!! $qrCode !!}
                <button class="btn btn-primary mt-3" onclick="window.print();return false;">Printen</button>
            </div>
        </div>
    </div>
@endsection
