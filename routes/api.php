<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiIbgeController;

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


// CRUD Produtos
Route::post('/product_create', [ApiController::class, 'create']);
Route::post('/product_update',  [ApiController::class, 'update']);
Route::delete('/product_delete',  [ApiController::class, 'delete']);
Route::get('/product_show',  [ApiController::class, 'show']);

// Busca IBGE
Route::get('/ibge_search', [ApiIbgeController::class, 'search']);
Route::get('/ibge_show', [ApiIbgeController::class, 'show']);
