<?php

use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/about', function () {
    return view('about');
});


//Route::get('/shop', function () {
//    return view('shop');
//});

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);


Route::get('/contact', [\App\Http\Controllers\ContactControler::class, 'index']);


Route::get("/admin/all-contacts", [\App\Http\Controllers\ContactControler::class, 'allContacts']);

