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

Route::get('/music', [MusicController::class, 'index']);
Route::middleware('auth:api')->group(function () {
    Route::post('/music', [MusicController::class, 'store']);
    Route::get('/music/pending', [MusicController::class, 'getPendingMusics']);
    Route::put('/music/{music}', [MusicController::class, 'update'])->middleware('admin');
    Route::delete('/music/{music}', [MusicController::class, 'destroy'])->middleware('admin');
});
