<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function() {
    Route::get('/user', [PelangganController::class, 'index']);
    Route::get('/user/{id}', [PelangganController::class, 'showId']);
    
    Route::put('/user/update/{id}', [PelangganController::class, 'update']);
    Route::delete('/user/delete/{id}', [PelangganController::class, 'destroy']);
    
});
//tanpa token
Route::post('/user/store', [PelangganController::class, 'store']);
Route::post('/user/login', [PelangganController::class, 'login']);
Route::post('verify-email', [PelangganController::class, 'verifyEmail']);
