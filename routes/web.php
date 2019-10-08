<?php

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
});

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('product', 'ProductController@index')->name('admin.product');
    Route::get('product/create', 'ProductController@create')->name('admin.product.create');
    Route::post('product/store', 'ProductController@store')->name('admin.product.store');
    Route::post('product/update-name', 'ProductController@updateName')->name('admin.product.update.name');
    Route::post('product/update-sellPrice', 'ProductController@updateSellPrice')->name('admin.product.update.sellPrice');
    Route::post('product/update-buyPrice', 'ProductController@updateBuyPrice')->name('admin.product.update.buyPrice');
    Route::post('product/update-stock', 'ProductController@updateStock')->name('admin.product.update.stock');
    Route::get('product/delete/{id}','ProductController@delete')->name('admin.product.delete');
});



