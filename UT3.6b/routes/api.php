<?php

use App\Http\Controllers\CentroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('centro/{centro}/contacto', [CentroController::class, 'contacto'])->name('centro.contacto');
