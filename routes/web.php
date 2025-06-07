<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

Route::get('validate/signup',[PostController::class,'signup']);

Route::post('validate/store',[PostController::class,'store']);

Route::get('validate/login',[PostController::class,'login'])->name('login');

Route::Post('validate/logincheck',[PostController::class,'logincheck'])->name('login.check');
// below all product controller
Route::get('admin/products/index',[ProductController::class,'index'])->name('products.index');

Route::get('admin/products/productAdd',[ProductController::class,'productAdd']);

Route::Post('admin/products/store',[ProductController::class,'store'])->name('products.store');