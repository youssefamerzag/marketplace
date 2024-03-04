<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


///Product

Route::get('/' , [ProductController::class , 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');

//profile

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [ProfileController::class, 'profileEdit'])->name('profile.profileEdit');
Route::put('/profile/{id}/edit', [ProfileController::class, 'profileUpdate'])->name('profile.profileUpdate');

//delete product from profile
Route::delete('/profile/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

//edit product
Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('product/edit/{product}', [ProductController::class, 'update'])->name('products.update');

//search
Route::get('products/', [ProductController::class , 'search'])->name('products.search');
