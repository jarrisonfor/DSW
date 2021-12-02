<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario/borrar', [UsuarioController::class, 'destroyAll'])->name('usuario.delete');
Route::get('/usuario/restaurar', [UsuarioController::class, 'restoreAll'])->name('usuario.restore');
Route::get('/usuario/{usuario}/publicaciones', [UsuarioController::class, 'publicaciones'])->name('usuario.publicaciones');
Route::resource('/usuario', UsuarioController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
