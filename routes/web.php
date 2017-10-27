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
Route::get('/stores/addStore', 'StoresController@addStore');
Route::post('/stores/addStore', 'StoresController@postStore');

Route::get('/sales/view', 'SalesController@index');
Route::post('/sales/postSales', 'SalesController@postSales');

Route::get('/products/view', 'ProductsController@index');
Route::get('/products/addProduct', 'ProductsController@addProducts');
Route::post('/products/createProduct', 'ProductsController@createProducts');

Route::get('/products/viewStocks', 'ProductStocksController@index');


Route::get('/employee/products', 'ProductStocksController@employeeProducts');
Route::get('/employee/searchItem/{e}', 'ProductStocksController@getItem');
Route::get('/employee/itemDetails/{e}', 'ProductStocksController@getItemDetails');
