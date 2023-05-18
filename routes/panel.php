<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\ProductController;


/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
|
*/

/**
 * =================================
 * products
 * =================================
 */

Route::resource('products', ProductController::class);
