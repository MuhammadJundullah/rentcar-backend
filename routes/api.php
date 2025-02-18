<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\ReservasiController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::options('api/*', function () {
    return response()->json([], 200);
});

Route::post('/post/ulasan', [UlasanController::class, 'store']);

Route::get('/get/armada', [ArmadaController::class, 'index']);

Route::get('/get/aktivitas', [AktivitasController::class, 'index']);

Route::get('/get/tour', [TourController::class, 'index']);

Route::get('/get/ulasan', [UlasanController::class, 'index']);

Route::post('/post/reservasi', [ReservasiController::class, 'store']);
