<?php

use App\Http\Controllers\VueloController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('vuelo.index');
});

Route::resource('/vuelo', VueloController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
