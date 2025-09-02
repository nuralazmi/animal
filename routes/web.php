<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('client.index');
});

Route::group(['prefix' => 'adm'], function () {
    Route::get('/', [HomeController::class,'index'])->name('adm.index');
    Route::get('/categories', [CategoryController::class,'index'])->name('adm.categories.index');
    Route::post('/categories', [CategoryController::class,'store'])->name('adm.categories.store');






    Route::get('/products', [ProductController::class,'index'])->name('adm.products.index');
    Route::get('/orders', [OrderController::class,'index'])->name('adm.orders.index');
});

/*
Rotaları - Controller() - Service(validasyon, silme-user ekleme) - Repository
User::create
*/
