<?php

use App\Http\Controllers\CashRegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//main site
Route::name('main.')->group(function () {
  Route::get('/', function () { return view('app.main.home'); })->name('index');
  Route::get('/news', function () { return view('app.main.news'); })->name('news');
  Route::get('/menu', function () { return view('app.main.menu'); })->name('menu');
  Route::get('/contact', function () { return view('app.main.contact'); })->name('contact');
});


//Cash Register
Route::name('cashregister.')->prefix('/kassa')->group(function () {
  Route::get('/', [CashRegisterController::class, 'index'])->name('index');
});