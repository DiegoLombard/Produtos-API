<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('produtos/{id?}', [ProdutoController::class,'index']);
Route::post('produtos/store', [ProdutoController::class,'store']);
Route::put('produtos/update/{id}', [ProdutoController::class,'update']);
Route::get('produtos/search/{marca}', [ProdutoController::class,'search']);
Route::delete('produtos/destroy/{id}', [ProdutoController::class,'destroy']);
