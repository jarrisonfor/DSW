<?php

use App\Http\Controllers\ProveedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('proveedor/{proveedor}/contacto', [ProveedorController::class, 'contacto'])->name('proveedor.contacto');
