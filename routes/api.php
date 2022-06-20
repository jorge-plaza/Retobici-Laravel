<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/retobici/stops', [StopController::class, 'getAllStops']);

Route::middleware('auth:sanctum')->group(function (){
    Route::post('/retobici/bikes/unlock/{bike}', [BikeController::class, 'unlockBike']);
    Route::put('/retobici/routes', [RouteController::class, 'createRoute']);
});

