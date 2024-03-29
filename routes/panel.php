<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\UserController;
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

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::post('users/admin/{user}', [UserController::class, 'toggleAdmin'])->name('users.admin.toggle');
