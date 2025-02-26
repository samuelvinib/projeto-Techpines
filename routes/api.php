<?php

use App\Http\Controllers\MusicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

//Route::apiResource('/music', MusicController::class);
Route::apiResource('/music', MusicController::class)->except(['store', 'update', 'destroy']);
Route::middleware('auth:api')->group(function () {
    Route::post('/music', [MusicController::class, 'store']);
    Route::put('/music/{music}', [MusicController::class, 'update']);
    Route::delete('/music/{music}', [MusicController::class, 'destroy']);
});
