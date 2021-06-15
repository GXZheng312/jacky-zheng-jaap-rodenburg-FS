<?php

namespace App\Http\Controllers;

use App\Http\Requests\AfhaalRequest;
use Illuminate\Http\Request;

class AfhaalController extends Controller
{
    public function index()
    {
        return view('app.cashier.index');
    }

    public function submit(AfhaalRequest $request){
    die(json_encode($request->all()));
    }
}
