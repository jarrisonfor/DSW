<?php

use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;

Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('auth.social');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
