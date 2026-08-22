<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('sucursales', App\Http\Controllers\Api\SucursalController::class)
->parameters([
    'sucursales' => 'sucursal'
]);

Route::apiResource('clientes', App\Http\Controllers\Api\ClienteController::class);
Route::apiResource('vehiculos', App\Http\Controllers\Api\VehiculoController::class);
