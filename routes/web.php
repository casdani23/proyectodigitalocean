<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\supervisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//supervisor
Route::get('/supervisor', [supervisorController::class, 'index'])->name('supervisor.index');
Route::get('/codetoken', [supervisorController::class, 'correoTokenSupervisor'])->name('vistacodigo');
Route::get('/codigosupervisor', [ClienteController::class, 'showtoken'])->name('codigosupervisor');

//Cliente
Route::get('/productos/codigotoken', [ClienteController::class, 'correotoken'])->name('productos.correoToken');
Route::resource('productos',ClienteController::class)->names('clientecrud');
Route::post('productos/{id}/activar', [ClienteController::class, 'activarProducto'])->name('productos.activar');
Route::post('productos/{id}/desactivar', [ClienteController::class, 'desactivarProducto'])->name('productos.desactivar');
Route::put('/productos/{id}', [ClienteController::class, 'update'])->name('productos.update');
Route::post('/verificar-token', [ClienteController::class,'verificarToken'])->name('verificar-token');
Route::get('productos/verificacionCodigo',[ClienteController::class,'store'])->name('enviar');


//Administrador
Route::get('/Administrador', [AdministradorController::class, 'index'])->name('administrador.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','emailmidleware'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
