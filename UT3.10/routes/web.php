<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;


Route::resource('alumno', AlumnoController::class);
Route::get('alumno/{alumno}/pdf', [AlumnoController::class, 'pdf'])->name('alumno.pdf');

Route::get('/', function () {
    /* return view('welcome'); */
    return redirect()->route('alumno.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
