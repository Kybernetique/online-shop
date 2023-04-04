<?php

use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index']);

Route::get('/products', [ProductController::class, 'products']);
Route::get('/products/{product}', [ProductController::class, 'product']);

Route::get('/categories', [CategoryController::class, 'categories']);
Route::get('/categories/{category}', [CategoryController::class, 'category']);
