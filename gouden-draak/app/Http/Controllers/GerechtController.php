<?php

namespace App\Http\Controllers;

use App\Models\Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
    public function index()
    {
        $gerechten = Gerecht::all();

        return view('app.cashier.gerecht.index', ['gerechten' => $gerechten]);
    }

    public function create()
    {
        return view('app.cashier.gerecht.createOrEdit');
    }

    public function store()
    {
        return view('app.cashier.gerecht.index', ['gerechten' => Gerecht::all()]);
    }

    public function show($id)
    {
        $gerecht = Gerecht::findOrFail($id);

        
        return view('app.cashier.gerecht.show', ['gerecht' => $gerecht]);
    }

    public function edit($id)
    {
        $gerecht = Gerecht::findOrFail($id);

        return view('app.cashier.gerecht.createOrEdit', ['gerecht' => $gerecht]);
    }


    public function update($id)
    {
        $gerecht = Gerecht::findOrFail($id);

        return view('app.cashier.gerecht.createOrEdit', ['gerecht' => $gerecht]);
    }

    public function destroy($id)
    {
        $gerechten = Gerecht::all();

        return view('app.cashier.gerecht.index', ['gerechten' => $gerechten]);
    }
}
