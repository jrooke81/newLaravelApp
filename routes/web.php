<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/catagory/{catagory_name}', 'HomeController@catagory')->name('browse_catagory');
Route::get('/book/{book_id}', 'BookController@index')->name('book_details');

Route::get('/basket', 'BasketController@index');
Route::post('/basket/alter_quantity/{basket_item_id}', 'BasketController@alter_quantity')->name('alter_quantity');
Route::post('/basket/remove_book/{basket_item_id}', 'BasketController@remove_book')->name('remove_book');
Route::post('/basket/add_to_basket/{book_id}', 'BasketController@add_to_basket')->name('add_to_basket');

Route::post('/order/{user_id}', 'OrderController@order_confirmed')->name('order_confirmed');

Route::get('/stock', 'StockController@manage_index')->middleware('admin')->name('manage_stock');
Route::get('/stock/add', 'StockController@add_index')->middleware('admin')->name('add_stock');
Route::post('/stock/alter_stock_quantity/{book_id}', 'StockController@alter_stock_quantity')->middleware('admin')->name('alter_stock_quantity');
Route::post('/stock/add_submit', 'StockController@add_submit')->middleware('admin')->name('add_submit');
Route::post('/stock/remove_from_stock/{book_id}', 'StockController@remove_from_stock')->middleware('admin')->name('remove_from_stock');
