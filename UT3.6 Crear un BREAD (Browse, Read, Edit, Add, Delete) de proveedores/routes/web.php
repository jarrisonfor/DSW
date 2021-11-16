<?php

use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;


Route::resource('proveedor', ProveedorController::class);
Route::get('proveedor/{proveedor}/pdf', [ProveedorController::class, 'pdf'])->name('proveedor.pdf');
Route::get('proveedor/{proveedor}/productos', [ProveedorController::class, 'productos'])->name('proveedor.productos');

Route::get('/', function () {
    /* return view('welcome'); */
    redirect('/proveedor');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
