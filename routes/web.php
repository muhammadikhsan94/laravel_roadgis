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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('create', 'App\Http\Controllers\HomeController@create')->name('create');
Route::get('read', 'App\Http\Controllers\HomeController@read')->name('read');
Route::post('store', 'App\Http\Controllers\HomeController@store')->name('store');
Route::get('read/id_lapor={id_lapor}', 'App\Http\Controllers\HomeController@detailLapor')->name('detailLapor');

Route::get('login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('login_in', 'App\Http\Controllers\LoginController@auth');

Route::get('register', 'App\Http\Controllers\LoginController@register')->name('register');

Auth::routes();

Route::prefix('admin')->group(function () {
	Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin.home');
	Route::get('read/id_lapor={id_lapor}', 'App\Http\Controllers\AdminController@read')->name('admin.read');
	Route::post('update', 'App\Http\Controllers\AdminController@update')->name('admin.update');
	Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('admin.logout');
});