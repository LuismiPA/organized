<?php

use App\Http\Controllers\API\ApartmentApiController;
use App\Http\Controllers\API\LimpiezasApiController;
use App\Http\Controllers\API\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user/trabajadores', [UserApiController::class, 'trabajadores']);

Route::get('limpiezas/trabajador/{id_trabajador}',[LimpiezasApiController::class , 'trabajador']);
Route::get('limpiezas/trabajo/acabado', [LimpiezasApiController::class, 'acabado']);
Route::get('limpiezas/trabajo/planificado', [LimpiezasApiController::class, 'planificado']);
Route::get('limpiezas/trabajo/pendiente', [LimpiezasApiController::class, 'pendiente']);
/* Route::get('user/detalles', [UserApiController::class, 'detalles']); */

Route::apiResource('user', UserApiController::class);
Route::apiResource('apartment', ApartmentApiController::class);
Route::apiResource('limpiezas', LimpiezasApiController::class);

 
