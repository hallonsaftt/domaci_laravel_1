<?php

use App\Http\Controllers\AddProductController;
use App\Http\Controllers\ContactControler;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
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

Route::controller(ContactControler::class)->name('contact.')->group(function () {
        Route::get('/contact', 'index')->name('index');
        Route::post('/contact/send', 'sendContact')->name('send');
    });



Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function () {


    Route::controller(AddProductController::class)->name('product.')->group(function () {
        Route::get('/add-product', 'index')->name('add');
        Route::post('/create-product', 'create')->name('create');
    });


    Route::get("/products", [ShopController::class, 'AdminProducts']);

    Route::controller(ProductsController::class)->prefix("products")->name("products.")->group(function () {

        Route::get('/all', 'index')->name('all');
        Route::get('/update/{id}', 'update')->name('update');
        Route::get('/edit/{product}', 'singleProduct')->name('single');
        Route::post('/save/{product}', 'saveProduct')->name('save');
        Route::get('/delete/{product}', 'deleteProduct')->name('delete');
    });


    Route::get("/all-contacts", [ContactControler::class, 'allContacts']);
    Route::get('/delete-contact/{contact}', [ContactControler::class, 'deleteContact']);


});




require __DIR__.'/auth.php';
