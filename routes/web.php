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

Route::get('/admin/product', 'ProductController@index')->name('admin.product');
Route::get('/admin/product/create', 'ProductController@create')->name('admin.product.create');
Route::post('/admin/product/store', 'ProductController@store')->name('admin.product.store');
Route::post('/admin/product/update-name', 'ProductController@updateName')->name('admin.product.update.name');
Route::post('/admin/product/update-sellPrice', 'ProductController@updateSellPrice')->name('admin.product.update.sellPrice');
Route::post('/admin/product/update-buyPrice', 'ProductController@updateBuyPrice')->name('admin.product.update.buyPrice');
Route::post('/admin/product/update-stock', 'ProductController@updateStock')->name('admin.product.update.stock');
Route::get('/admin/product/delete/{id}','ProductController@delete')->name('admin.product.delete');


