<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//comandos para executar as funções do controller
Route::get('/exibir', [TarefasController::class, 'index']);
Route::post('/postar', [TarefasController::class, 'store']);
Route::get('/detalhes/{id}', [TarefasController::class, 'show']);
Route::patch('/atualizar/{id}', [TarefasController::class, 'update']);
Route::delete('/apagar/{id}', [TarefasController::class, 'destroy']);