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

 Route::group(['as' => 'admin.', 'middleware' => ['auth','admin'], 'prefix' => 'admin'], function() {
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('/category', 'App\Http\Controllers\CategoryController');
    Route::resource('/products', 'App\Http\Controllers\ProductController');
    Route::resource('/pharmacies', 'App\Http\Controllers\PharmacyController');
 });

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/about', 'App\Http\Controllers\AboutController@about')->name('about');
Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');
Route::get('/products/{id}', 'App\Http\Controllers\AllProductController@products')->name('products');
Route::get('/productbrands/{id}', 'App\Http\Controllers\AllProductController@productsbrand')->name('productsbrand');
// Route::get('/productbyprice', 'App\Http\Controllers\AllProductController@productspricerange')->name('productspricerange');
Route::get('/productbyprice/{product}', 'App\Http\Controllers\AllProductController@productspricerange')->name('productspricerange');
Route::get('/products', 'App\Http\Controllers\AllProductController@allproducts')->name('allproducts');
Route::get('/productsbycat/{cat}/{search}', 'App\Http\Controllers\AllProductController@productbycat')->name('prodcat');
// Route::get('/cart/{product}/{image}', 'App\Http\Controllers\HomeController@addToCart')->name('cart');
Route::get('/cart/{productname}/{pharmaname}/{productprice}/{productquat}', 'App\Http\Controllers\HomeController@addToCart')->name('cart');
// Route::get('/cart/{product}/{image}', 'App\Http\Controllers\HomeController@addToCart2')->name('cart2');
Route::get('/product-details/{name}', 'App\Http\Controllers\DetailsController@index')->name('details');
// Route::get('/checkcart', 'App\Http\Controllers\HomeController@cart')->name('viewcart');


Route::group(['as' => 'cart.', 'prefix' => 'cart'], function () {
Route::get('/', 'App\Http\Controllers\HomeController@cart')->name('all');
Route::post('/remove/{product}', 'App\Http\Controllers\HomeController@removeProduct')->name('remove');
Route::post('/update/{product}/{price}', 'App\Http\Controllers\HomeController@updateProduct')->name('update');


});

Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');
Route::post('/sendemail', 'App\Http\Controllers\ContactController@sendemail')->name('sendemail');

Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->name('checkout');
Route::post('/order/{total}', 'App\Http\Controllers\CheckoutController@checkout')->name('checkoutorder');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
