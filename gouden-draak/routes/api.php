<?php

use App\Http\Controllers\Api\AanbiedingController;
use App\Http\Controllers\Api\AfhaalController;
use App\Http\Controllers\Api\GerechtController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user(); });
Route::get('gerechten', [GerechtController::class, 'gerechten']);
Route::get('soort-gerechten', [GerechtController::class, 'soortGerechten']);
Route::get('speciaal-aanbieding', [AanbiedingController::class, 'aanbiedingHighlight']);
Route::get('afhaal-order/details/{id}', [AfhaalController::class, 'orderDetails']);
Route::get('afhaal-order/qr-code/{id}', [AfhaalController::class, 'qrCode']);
