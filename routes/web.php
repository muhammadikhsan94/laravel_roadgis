<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('create', [HomeController::class, 'create'])->name('create');
Route::get('read', [ComplaintController::class, 'read'])->name('read');
Route::post('store', [ComplaintController::class, 'store'])->name('store');
Route::get('read/id_lapor={id_lapor}', [ComplaintController::class, 'detailLapor'])->name('detailLapor');

Route::post('login', [LoginController::class, 'authenticate']);

Route::prefix('v1admin')->group(function () {
	Route::get('/', [AdminController::class, 'index'])->name('v1admin.home');
	Route::get('read/id_lapor={id_lapor}', [AdminController::class, 'read'])->name('v1admin.read');
});