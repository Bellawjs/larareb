<?php

use App\Http\Controllers\IndexsController;
use Illuminate\Routing\Router;

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

Route::get('/', 'IndexController@index')->name('index');
Route::resource('test','TestController');
Route::get('home', 'IndexController@home')->name('home');
Route::get('laradmin', 'IndexController@laradmin')->name('laradmin');











