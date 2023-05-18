<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\PanelController;
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

Route::get('/', [PanelController::class, 'index'])->name('panel.index');

Route::resource('products', ProductController::class);
