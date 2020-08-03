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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function(){
    return redirect('/home');
});
Route::get('/book/{book_id}', 'BookController@index')->name('book_details');

Route::get('/basket', 'BasketController@index');
Route::post('/basket/alter_quantity/{basket_item_id}','BasketController@alter_quantity')->name('alter_quantity');
Route::post('/basket/remove_book/{basket_item_id}','BasketController@remove_book')->name('remove_book');
Route::post('/basket/add_to_basket/{book_id}','BasketController@add_to_basket')->name('add_to_basket');

Route::get('/stock', 'StockController@index')->middleware('admin');


