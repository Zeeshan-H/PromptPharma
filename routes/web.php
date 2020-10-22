<?php

use Illuminate\Support\Facades\Route;


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

 Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('/category', 'App\Http\Controllers\CategoryController');
    Route::resource('/products', 'App\Http\Controllers\ProductController');
    Route::resource('/pharmacies', 'App\Http\Controllers\PharmacyController');
 });



