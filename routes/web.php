<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/adm', function () {
    return view('admin.index');
});

Route::get('/adm/categories', function () {
    return view('admin.categories.index');
})->name('adm.categories.index');

