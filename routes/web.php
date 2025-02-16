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


Route::get("/admin/add-product", [\App\Http\Controllers\AddProductController::class, 'index']);


Route::post("/send-contact", [\App\Http\Controllers\ContactControler::class, 'sendContact']);

Route::post("/admin/product-create", [\App\Http\Controllers\AddProductController::class, 'create']);

Route::get("/admin/products", [\App\Http\Controllers\ShopController::class, 'AdminProducts']);



