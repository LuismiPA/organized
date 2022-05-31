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
Route::get('/admin/panel', [App\Http\Controllers\PagesController::class, 'adminPage'])->name('admin.panel');
Route::get('/admin/crear', [App\Http\Controllers\PagesController::class, 'crear'])->name('admin.crear');
    Route::post('/admin/crear', [App\Http\Controllers\PagesController::class, 'crear_usuario'])->name('admin.crear_usuario');


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

Auth::routes();
