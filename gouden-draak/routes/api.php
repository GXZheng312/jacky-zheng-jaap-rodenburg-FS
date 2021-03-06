<?php

use App\Http\Controllers\Api\AanbiedingController;
use App\Http\Controllers\Api\AfhaalController;
use App\Http\Controllers\Api\BestellingController;
use App\Http\Controllers\Api\CocktailController;
use App\Http\Controllers\Api\DailySalesController;
use App\Http\Controllers\Api\GerechtController;
use App\Http\Controllers\Api\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});
Route::get('gerechten', [GerechtController::class, 'gerechten']);
Route::get('soort-gerechten', [GerechtController::class, 'soortGerechten']);
Route::get('bijgerechten', [GerechtController::class, 'bijgerechten']);
Route::get('speciaal-aanbieding', [AanbiedingController::class, 'aanbiedingHighlight']);
Route::get('afhaal-order/details/{id}', [AfhaalController::class, 'orderDetails']);
Route::get('afhaal-order/qr-code/{id}', [AfhaalController::class, 'qrCode']);
Route::post('bestelling', [BestellingController::class, 'store']);
Route::post('bestellingen/op-datum', [BestellingController::class, 'byDates']);
Route::get('cocktails', [CocktailController::class, 'cocktails']);
Route::get('cocktails/{name}', [CocktailController::class, 'cocktailSearch']);
Route::get('pages', [PageController::class, 'pages']);
Route::get('pages/{name}', [PageController::class, 'pagesType']);
Route::get('aanbieding-week', [AanbiedingController::class, 'aanbiedingenOfWeek']);
Route::get('daily-sales', [DailySalesController::class, 'dailySales']);
