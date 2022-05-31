<?php

use Illuminate\Support\Facades\Auth;
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
/* 
Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('index'); */

Route::get('/', [App\Http\Controllers\PagesController::class, 'login'])->name('auth.login');
/* Route::get('/register', [App\Http\Controllers\PagesController::class, 'register'])->name('auth.register');
 */Route::get('/admin/panel', [App\Http\Controllers\PagesController::class, 'adminPage'])->name('admin.panel');



Auth::routes();


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
