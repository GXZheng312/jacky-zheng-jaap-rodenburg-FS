<?php

use App\Http\Controllers\AfhaalController;
use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\GerechtController;
use App\Http\Controllers\VerkoopController;
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
  Route::get('/', function () {
    return view('app.main.home');
  })->name('index');
  Route::get('/news', function () {
    return view('app.main.news');
  })->name('news');
  Route::get('/menu', function () {
    return view('app.main.menu');
  })->name('menu');
  Route::get('/contact', function () {
    return view('app.main.contact');
  })->name('contact');
  Route::get('/cocktail', function () {
    return view('app.main.cocktail');
  })->name('cocktail');
  Route::get('/aanbiedingen', function () {
    return view('app.main.aanbieding');
  })->name('aanbieding');
});

//Cash Register
Route::name('cashregister.')
  ->prefix('/kassa')
  ->middleware('auth')
  ->group(function () {
    Route::get('/', function () {
      return view('app.cashier.index');
    })->name('index');
    route::get('/verkoop', [VerkoopController::class, 'index'])->name('verkoop');

    Route::resource('gerecht', GerechtController::class); //automatically assign actions to the controller
  });

Route::get('/afhalen', [AfhaalController::class, 'index'])->name('afhaal.index');
Route::post('/afhalen', [AfhaalController::class, 'submit'])->name('afhaal.submit');
Route::get('/order/{id}', [AfhaalController::class, 'show'])->name('order.show');

require __DIR__ . '/auth.php';
