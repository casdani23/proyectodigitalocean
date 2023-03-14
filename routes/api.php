<?php

use App\Http\Controllers\VerificacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/mostrar1', [VerificacionController::class, 'consumir']);
Route::post('/codigoapp', [VerificacionController::class, 'validarcodigoapp']);
Route::post('/verificarcodigomovil', [VerificacionController::class, 'validarcodigologin']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
