<?php

use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;


Route::resource('proveedor', ProveedorController::class);
Route::get('proveedor/{proveedor}/pdf', [ProveedorController::class, 'pdf'])->name('proveedor.pdf');
Route::get('proveedor/{proveedor}/productos', [ProveedorController::class, 'productos'])->name('proveedor.productos');

Route::get('/', function () {
    /* return view('welcome'); */
    return redirect()->route('proveedor.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/* Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

*/
