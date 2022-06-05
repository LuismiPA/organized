<?php

use App\Http\Controllers\API\UserApiController;
use GuzzleHttp\Middleware;
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

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin/panel', [App\Http\Controllers\PagesController::class, 'adminPage'])->middleware('admin')->name('admin.panel');
    Route::get('/admin/crear', [App\Http\Controllers\UserController::class, 'crear'])->name('admin.crear');
    Route::post('/admin/crear', [App\Http\Controllers\UserController::class, 'crear_usuario'])->name('admin.crear_usuario');
    Route::get('/admin/editar/{id}', [App\Http\Controllers\UserController::class, 'editar'])->name('admin.editar');
    Route::put('/admin/editar/{id}', [App\Http\Controllers\UserController::class, 'editado'])->name('admin.editado');
});

/* Route::get('/limpieza/crear', [App\Http\Controllers\LimpiezasController::class, 'limpiezaForm'])->name('limpiezaForm'); */
    Route::post('/limpieza/crear', [App\Http\Controllers\LimpiezasController::class, 'crear_limpieza'])->name('crear_limpieza');
    Route::put('/limpieza/editar/{id}', [App\Http\Controllers\LimpiezasController::class, 'editar_limpieza'])->name('editar_limpieza');

Route::middleware('auth', 'propietario')->group(function () {
    Route::get('/user/panel', [App\Http\Controllers\PagesController::class, 'userPage'])->name('user.panel');
});

Route::get('/worker/panel', [App\Http\Controllers\PagesController::class, 'workerPage'])->name('worker.panel');

//Consulta usuario auth
Route::get('user/detalles', [UserApiController::class, 'detalles']);


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

Auth::routes();


// HACER ESTO PARA ACTUALIZAR CON VUE
    Route::get('/{any}', function(){
        return view('admin.panel');
    })->where('any','.*');



   /* Route::get('/{any}', function () {
        return view('user.panel');
    })->where('any', '.*')->middleware('auth'); */



   /*  Route::get('/{any}', function () {
        return view('admin.panel');
    })->where('any', '.*');  */

