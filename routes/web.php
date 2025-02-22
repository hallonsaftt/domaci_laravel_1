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


Route::get("/admin/add-product", [\App\Http\Controllers\AddProductController::class, 'index'])->name('add-product');


Route::post("/send-contact", [\App\Http\Controllers\ContactControler::class, 'sendContact']);

Route::post("/admin/product-create", [\App\Http\Controllers\AddProductController::class, 'create'])->name('productCreate');

Route::get("/admin/products", [\App\Http\Controllers\ShopController::class, 'AdminProducts']);


Route::get("/admin/all-products", [\App\Http\Controllers\ProductsController::class, 'index'])->name('allProducts');

Route::put('/admin/updateProduct/{id}', [\App\Http\Controllers\ProductsController::class, 'update'])->name('updateProduct');



Route::get('/admin/delete-product/{product}', [\App\Http\Controllers\ProductsController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('/admin/delete-contact/{contact}', [\App\Http\Controllers\ContactControler::class , 'deleteContact']);





