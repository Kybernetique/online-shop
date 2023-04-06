<?php

use App\Http\Controllers\CartController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/user', [UserController::class, 'user'])->name('user');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('/cart/update/{product}', [CartController::class, 'updateItem'])->name('update-item');

Route::get('/products', [ProductController::class, 'products'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'product'])->name('product');

Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
Route::get('/categories/{category}', [CategoryController::class, 'category'])->name('category');
