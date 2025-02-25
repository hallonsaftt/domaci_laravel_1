<?php

use App\Http\Controllers\AddProductController;
use App\Http\Controllers\ContactControler;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/about', function () {
    return view('about');
});

Route::get('/shop', [ShopController::class, 'index']);


Route::get('/contact', [ContactControler::class, 'index']);

Route::post("/send-contact", [ContactControler::class, 'sendContact']);


Route::middleware('auth')->prefix("admin")->group(function () {



    Route::get("/all-contacts", [ContactControler::class, 'allContacts']);


    Route::get("/add-product", [AddProductController::class, 'index'])
        ->name('add-product');


    Route::post("/product-create", [AddProductController::class, 'create'])
        ->name('productCreate');

    Route::get("/products", [ShopController::class, 'AdminProducts']);


    Route::get("/all-products", [ProductsController::class, 'index'])

        ->name('allProducts');

    Route::put('/updateProduct/{id}', [ProductsController::class, 'update'])

        ->name('updateProduct');



    Route::get('/product/edit/{product}', [ProductsController::class, 'singleProduct'])

        ->name('singleProduct');

    Route::post('/product/save/{product}', [ProductsController::class, 'saveProduct'])

        ->name('saveProduct');


    Route::get('/delete-product/{product}', [ProductsController::class, 'deleteProduct'])

        ->name('deleteProduct');

    Route::get('/delete-contact/{contact}', [ContactControler::class, 'deleteContact']);


});




require __DIR__.'/auth.php';
