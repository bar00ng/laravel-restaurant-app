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

Route::get('/', 'App\Http\Controllers\ProductsController@index')->name("home");

Route::get('/formTambah', 'App\Http\Controllers\ProductsController@tampilFormTambah')->name("formTambah");

Route::post('/storeData', 'App\Http\Controllers\ProductsController@store')->name("storeData");

Route::delete('/hapusData/{id}','App\Http\Controllers\ProductsController@deleteData')->name("hapusData");

Route::get('/formEdit/{id}', 'App\Http\Controllers\ProductsController@tampilFormEdit')->name("formEdit");

Route::patch('/patchData/{id}', 'App\Http\Controllers\ProductsController@patch')->name("patchData");

Route::get('/addToCart/{id}', 'App\Http\Controllers\CartController@addToCart')->name("addToCart");

Route::get('/addToCart/{id}', 'App\Http\Controllers\CartController@addToCart')->name("addToCart");

Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name("cart");

Route::patch('update-cart', 'App\Http\Controllers\CartController@update')->name('update.cart');

Route::delete('deleteFromCart', 'App\Http\Controllers\CartController@remove')->name("remove.from.cart");

Route::post('storeCart', 'App\Http\Controllers\CartController@storeCart')->name('storeCart');

Route::get('listOrder', 'App\Http\Controllers\OrderController@index')->name('listOrder');

Route::patch('update/{id}', 'App\Http\Controllers\OrderController@update')->name('updateStatus');

Route::delete('delete/{id}', 'App\Http\Controllers\OrderController@delete')->name('deleteOrder');

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');

Route::post('auth', 'App\Http\Controllers\AuthController@login')->name('auth');

Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');