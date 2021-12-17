<?php

use App\Http\Controllers\PasajeController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\VueloController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('vuelo.index');
});

Route::get('/pasaje', [PasajeController::class, 'index']);
Route::get('/pasaje/{pasaje}/sumar', [PasajeController::class, 'sumar'])->name('sumar');
Route::get('/pasaje/{pasaje}/restar', [PasajeController::class, 'restar'])->name('restar');
Route::get('/piloto', [PilotoController::class, 'index']);
Route::get('/piloto/{piloto}', [PilotoController::class, 'show'])->name('piloto.show');

Route::resource('/vuelo', VueloController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
