<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerificacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailtrapController;
use App\Mail\Codigoverificacionemail;
use Illuminate\Support\Facades\Mail;

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



Route::get('/verificacionCodigo', [VerificacionController::class,'store'])->name('mostrar');

Route::get('/code', [VerificacionController::class, 'show'])->middleware('signed')->name('html');

Route::post('/dashboard', [VerificacionController::class, 'validarcodigologin'])->name('inicio');;




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','emailmidleware'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
