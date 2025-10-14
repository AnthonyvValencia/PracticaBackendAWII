<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\CategoriaController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//return $request->user();
//});
//Route::apiResouse('categoiria', CategoriaController::class);
//Route::apiResource('producto', ProductoController::class);
//Rutas de Categoria
Route::get('/consultar-todas-categorias', [CategoriaController::class, 'index']);
Route::get('/consultar-todas-categorias/{categoria}', [CategoriaController::class, 'show']);
Route::post('/guardar-categoria', [CategoriaController::class, 'store']);
Route::put('/actualizar-categoria/{categoria}', [CategoriaController::class, 'update']);
Route::delete('/eliminar-categoria/{categoria}', [CategoriaController::class, 'destroy']);

Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);