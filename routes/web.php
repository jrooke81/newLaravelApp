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

Route::get('/', 'IndexController@getBooks');
Route::get('/book/{id}', 'BookController@details');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/stock', 'StockController@index')->middleware('admin');

