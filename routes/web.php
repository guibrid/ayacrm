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

Route::get('/', 'DashboardController@index');

Route::get( 'orders/showByDates', 'OrdersController@showByDates');
Route::post( '/getprice', 'ProductsController@getprice'); // Ajax call to get price by product id
Route::post( '/getimg', 'ProductsController@getimg'); // Ajax call to get price by product id
Route::post( '/getordersbydate', 'OrdersController@getOrdersByDate'); // Ajax call to get price by product id

Route::resources([
    'products' => 'ProductsController',
    'orders' => 'OrdersController',
    'customers' => 'CustomersController',
    'dashboard' => 'DashboardController',
]);
Auth::routes();


