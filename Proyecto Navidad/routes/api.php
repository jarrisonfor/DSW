<?php

use App\Http\Controllers\LotController;
use Illuminate\Support\Facades\Route;

Route::get('lot', [LotController::class, 'indexJson'])->name('lot.json');
