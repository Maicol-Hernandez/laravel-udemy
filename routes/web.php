<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\OrderPaymentController;


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

Route::get('/', 'Maincontroller@index')->name('main');


/**
 * =================================
 * products
 * =================================
 */

// Route::resource('products', ProductController::class)->only(['index', 'show', 'create']);
// Route::resource('products', ProductController::class)->except(['index', 'edit']);
// Route::resource('products', ProductController::class);
Route::resource('products.carts', ProductCartController::class)->only(['store', 'destroy']);
Route::resource('carts', CartController::class)->only(['index']);
Route::resource('orders', OrderController::class)->only(['create', 'store']);
Route::resource('orders.payments', OrderPaymentController::class)->only(['create', 'store']);

Auth::routes([
    'verify' => true
]);

// Route::get('/home', [HomeController::class, 'index'])->name('home');
