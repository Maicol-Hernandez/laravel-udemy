<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ProductController;

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
    return view('welcome');
})->name('main');


/**
 * =================================
 * products
 * =================================
 */

// products index
Route::get('products', 'ProductController@index')->name('products.index');

// products create 
Route::get('products/create', 'ProductController@create')->name('products.create');

// products create POST
Route::post('products', 'ProductController@store')->name('products.store');

// products show
Route::get('products/{product}', 'ProductController@show')->name('products.show');

// products product edit
Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

// products update
Route::match(['put', 'patch'], '/products/{product}', 'ProductController@update')->name('products.update');

Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');
