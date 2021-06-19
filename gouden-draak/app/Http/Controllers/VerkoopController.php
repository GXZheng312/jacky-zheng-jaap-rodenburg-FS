<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerkoopController extends Controller
{
    public function index(){
        return view('app.cashier.verkoop.overview');
    }
    public function sales(){
        return view('app.cashier.verkoop.sales');
    }
}
