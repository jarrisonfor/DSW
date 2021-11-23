<?php

use App\Http\Controllers\CentroController;
use Illuminate\Support\Facades\Route;


Route::resource('centro', CentroController::class);
Route::get('centro/{centro}/pdf', [CentroController::class, 'pdf'])->name('centro.pdf');

Route::get('/', function () {
    /* return view('welcome'); */
    return redirect()->route('centro.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
