<?php

namespace App\Http\Controllers;

use App\Models\Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
    public function index()
    {
        $gerechten = Gerecht::all();

        return view('app.cashier.gerecht.index', ['gerechten' => $gerechten]);
    }

    /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
    public function create()
    {
        return view('app.cashier.gerecht.createOrEdit');
    }

    /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
    public function store()
    {
        return view('app.cashier.gerecht.index', ['gerechten' => Gerecht::all()]);
    }

    /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function show($id)
    {
        $gerecht = Gerecht::findOrFail($id);

        
        return view('app.cashier.gerecht.show', ['gerecht' => $gerecht]);
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function edit($id)
    {
        $gerecht = Gerecht::findOrFail($id);

        return view('app.cashier.gerecht.createOrEdit', ['gerecht' => $gerecht]);
    }

    /** 
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function update($id)
    {
        $gerecht = Gerecht::findOrFail($id);

        return view('app.cashier.gerecht.createOrEdit', ['gerecht' => $gerecht]);
    }
    
    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function destroy($id)
    {
        $gerechten = Gerecht::all();

        return view('app.cashier.gerecht.index', ['gerechten' => $gerechten]);
    }
}
