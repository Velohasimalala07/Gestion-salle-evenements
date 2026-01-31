<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/inscription', [InscriptionController::class, 'store']);



Route::post('/reservations', [ReservationController::class, 'store']);
Route::get('/admin/reservations', [ReservationController::class, 'index']);
