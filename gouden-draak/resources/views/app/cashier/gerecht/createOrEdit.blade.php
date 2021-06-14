@extends('layouts.kassa')
@section('content')
<div class="container">

@if ($errors->any())
    <div class="alert alert-warning alert-dismissable mt-3" role="alert">
        <h3 class="alert-heading font-size-h4 font-w400">Error!</h3>
        @foreach ($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
        @endforeach
    </div>
@endif

<h1 class="mt-3"> @if(isset($gerecht)) Gerecht aanpassen @else Gerecht aanmaken @endif </h1>

<a href="{{ route('cashregister.gerecht.index') }}" class="btn btn-secondary"> Terug </a>

@if(isset($gerecht))
    {{ Form::model($gerecht, ['route' => ['cashregister.gerecht.update', 'gerecht' => $gerecht->id], 'method' => 'patch', 'class' => 'row g-3' ]) }}
    {{ Form::hidden('id', $gerecht->id) }}
@else
    {{ Form::open(['route' => ['cashregister.gerecht.store'], 'method' => 'post', 'class' => 'row g-3' ]) }}
@endif

    <div class="col-md-6">  
        {{ Form::label('menunummer', 'Menunummer', ['class' => 'form-label']) }}
        {{ Form::text('menunummer', old('menunummer'), ['class' => 'form-control']) }}
    </div>

    <div class="col-md-6">
        {{ Form::label('menu_toevoeging', 'Menu Toevoeging', ['class' => 'form-label']) }}
        {{ Form::text('menu_toevoeging', old('menu_toevoeging'), ['class' => 'form-control']) }}
    </div>

    <div class="col-12">
        {{ Form::label('naam', 'Naam', ['class' => 'form-label']) }}
        {{ Form::text('naam', old('naam'), ['class' => 'form-control']) }}
    </div>

    <div class="col-md-4">
        {{ Form::label('prijs', 'Prijs', ['class' => 'form-label']) }}
        {{ Form::number('prijs', old('prijs'), ['class' => 'form-control', 'step' => '0.01']) }}
    </div>

    <div class="col-md-4">
        {{ Form::label('soortgerecht_id', 'Kies een soortgerecht', ['class' => 'form-label']) }}
        {{ Form::select('soortgerecht_id', $soortgerechten,  old('soortgerecht_id'), ['class' => 'form-control']) }}
    </div>

    <div class="col-md-4">
        {{ Form::label('pittigheid_id', 'Kies een pittigheid', ['class' => 'form-label']) }}
        {{ Form::select('pittigheid_id', $pittigheids,  old('pittigheid_id'), ['class' => 'form-control']) }}
    </div>


    <div class="col-12">
        {{ Form::label('Allergenes', 'Selecteer allergenes', ['class' => 'form-label']) }}
        @foreach ($allergenes as $allergene)
        <div class="form-check">
            @if ((is_array(old('Allergenes')) && in_array($allergene->id, old('Allergenes'))) || (isset($gerecht) && $gerecht->allergenes->contains($allergene->id)))  
            {{ Form::checkbox('Allergenes[]', $allergene->id, true, ['class' => 'form-check-input']) }}
            @else
            {{ Form::checkbox('Allergenes[]', $allergene->id, false, ['class' => 'form-check-input']) }}
            @endif
            {{ Form::label('Allergenes', $allergene->naam, ['class' => 'form-check-label']) }}
        </div>
        @endforeach
    </div>

    <div class="col-12">
        {{ Form::label('beschrijving', 'Beschrijving', ['class' => 'form-label']) }}
        {{ Form::textarea('beschrijving',  old('beschrijving'), ['class' => 'form-control']) }}
    </div>

    <div class="col-12">
        {{ Form::submit(isset($gerecht) ? 'Wijzigen' : 'Aanmaken', ['name' => 'submit', 'class' => 'btn btn-primary float-end'])}}
    </div>

    {{ Form::close() }}
</div>
@endsection
