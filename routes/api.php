<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

Route::get('/cars',[AuthController::class,'index']);

Route::get('/cars/{car}',[CarController::class,'show']);

Route::middleware('auth:sanctum')->group(function(){
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::post('/reservations', [ReservationController::class, 'store']);
        Route::get('/my-reservations', [ReservationController::class, 'mine']);
        Route::patch('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel']);

        Route::middleware('admin')->group(function () {
        Route::post('/cars', [CarController::class, 'store']);
        Route::put('/cars/{car}', [CarController::class, 'update']);
        Route::delete('/cars/{car}', [CarController::class, 'destroy']);
    });
});

