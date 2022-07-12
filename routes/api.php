<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RewardController;
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
Route::get('/stops', [StopController::class, 'getAllStops']);
Route::get('/rewards', [RewardController::class, 'getAllRewards']);

Route::middleware('auth:sanctum')->group(function (){

    Route::post('/stops/{bike}/unlock', [StopController::class, 'unlockBike']);
    Route::post('/stops/{stop}/reserve/{type}', [StopController::class, 'reserveBike']);
    Route::get('/stops/{stop}/lock', [StopController::class, 'lockBike']);

    Route::put('/routes/{bike}', [RouteController::class, 'createRoute']);
    Route::post('/routes/finish', [RouteController::class, 'finishRoute']);

    Route::post('/rewards/{reward}', [RewardController::class, 'obtainReward']);
    Route::get('/rewards/redeemed', [RewardController::class, 'getUserRewards']);
    Route::get('/rewards/not/redeemed', [RewardController::class, 'getNotRedeemedRewards']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/test', function (){
    $stops = \App\Models\Stop::all();
    $remove = $stops->first();
    return $stops->filter(function ($value) use ($remove){
        return $value!=$remove;
    });
});

