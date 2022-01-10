<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
        Route::put('invoice/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
        Route::delete('invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');

        Route::get('client/create', [ClientController::class, 'create'])->name('client.create');
        Route::post('client', [ClientController::class, 'store'])->name('client.store');
        Route::get('client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
        Route::put('client/{client}', [ClientController::class, 'update'])->name('client.update');
        Route::delete('client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

        Route::get('product', [ProductController::class, 'index'])->name('product.index');
        Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('product', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');
        Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

        Route::get('lot', [LotController::class, 'index'])->name('lot.index');
        Route::get('lot/create', [LotController::class, 'create'])->name('lot.create');
        Route::post('lot', [LotController::class, 'store'])->name('lot.store');
        Route::get('lot/{lot}', [LotController::class, 'show'])->name('lot.show');
        Route::get('lot/{lot}/edit', [LotController::class, 'edit'])->name('lot.edit');
        Route::put('lot/{lot}', [LotController::class, 'update'])->name('lot.update');
        Route::delete('lot/{lot}', [LotController::class, 'destroy'])->name('lot.destroy');

        Route::get('price', [PriceController::class, 'index'])->name('price.index');
        Route::get('price/create', [PriceController::class, 'create'])->name('price.create');
        Route::post('price', [PriceController::class, 'store'])->name('price.store');
        Route::get('price/{price}', [PriceController::class, 'show'])->name('price.show');
        Route::get('price/{price}/edit', [PriceController::class, 'edit'])->name('price.edit');
        Route::put('price/{price}', [PriceController::class, 'update'])->name('price.update');
        Route::delete('price/{price}', [PriceController::class, 'destroy'])->name('price.destroy');

        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');
        Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
        Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('invoice', [InvoiceController::class, 'index'])->name('invoice.index');
        Route::get('invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
        Route::post('invoice', [InvoiceController::class, 'store'])->name('invoice.store');
        Route::get('invoice/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
        Route::get('invoice/{invoice}/pdf', [InvoiceController::class, 'pdf'])->name('invoice.pdf');
        Route::get('invoice/{invoice}/email', [InvoiceController::class, 'sendInvoiceEmail'])->name('invoice.email');
        Route::get('/', function () {
            return view('dashboard', ['invoices' => Invoice::orderBy('id', 'desc')->get(), 'products' => Product::orderBy('id', 'desc')->get(), 'clients' => Client::orderBy('id', 'desc')->get()]);
        })->name('dashboard');

        Route::get('client', [ClientController::class, 'index'])->name('client.index');
        Route::get('client/{client}', [ClientController::class, 'show'])->name('client.show');
    });

});
