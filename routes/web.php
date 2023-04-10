<?php

use App\Http\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnityController;
use App\Http\Controllers\UserController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::resource('/unities', UnityController::class);
  Route::resource('/users', UserController::class);
  Route::resource('/product-categories', ProductCategoryController::class);
  Route::resource('/products', ProductController::class);
  Route::resource('/orders', OrderController::class);
});
