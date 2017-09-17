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


Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/dashboard/view', 'HomeController@index');

Route::get('/stores/view', 'StoresController@index');

Route::get('/sales/view', 'SalesController@index');

Route::get('/products/view', 'ProductsController@index');
Route::get('/products/addProduct', 'ProductsController@addProducts');
Route::post('/products/createProduct', 'ProductsController@createProducts');