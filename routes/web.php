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

Route::get('/', function () {
    return view('welcome');
});
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::get('product/{product}', 'ProductController@show')->name('product.show');
Route::get('order/product/{product}', 'ProductController@removeOrder')->name('order.product.delete');
Route::get('order', 'OrderController@index')->name('order.index');
Route::get('order/show/{id}', 'OrderController@show')->name('order.show');
Route::get('order/new', 'OrderController@create')->name('order.create');
Route::post('order/create', 'OrderController@store')->name('order.store');
Route::get('order/{id}/edit', 'OrderController@edit')->name('order.edit');
Route::put('order/{id}/update', 'OrderController@update')->name('order.update');
Route::delete('order/destroy/{id}', 'OrderController@destroy')->name('order.destroy');
Route::get('/downloadPDF/{id}','OrderController@downloadPDF');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
