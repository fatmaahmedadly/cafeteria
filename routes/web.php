<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderCartController;
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::resource("/products",ProductController::class);
Route::resource("/client",UserController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addcart/{id}', [App\Http\Controllers\CartController::class, 'addcart'])->name('addcart');
Route::resource("/carts",CartController::class);
Route::resource("/orders",OrderController::class);
Route::post('/increment/{id}',[App\Http\Controllers\CartController::class,'increment'])->name('increment');
Route::post('/decrement/{id}',[App\Http\Controllers\CartController::class,'decrement'])->name('decrement');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::resource("/ordercart",OrderCartController::class);
Route::get('/myorder', [App\Http\Controllers\CategoryController::class, 'myorders'])->name('category.myorder');