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

Route::get('/', function(){
    return redirect('/home');
});
Route::get('/book/{id}', 'BookController@index');
Route::get('/basket', 'BasketController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/basket/alter_quantity/{basket_item_id}','BasketController@alter_quantity')->name('alter_quantity');

Route::get('/stock', 'StockController@index')->middleware('admin');

