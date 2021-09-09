<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListesController;
use App\Http\Controllers\TodosController;
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

Route::get('/', [ListesController::class, 'index']);

Route::prefix('/listes')->group(function(){
    Route::post('/store', [ListesController::class, 'store']);
    Route::put('/update/{id}', [ListesController::class, 'update']);
    Route::get('/destroy/{id}', [ListesController::class, 'destroy']);
    } 
);
Route::get('/todos', [TodosController::class, 'index']);
Route::prefix('/todos')->group(function(){
    Route::post('/store', [TodosController::class, 'store']);
    Route::put('/update/{id}', [TodosController::class, 'update']);
    Route::get('/destroy/{id}', [TodosController::class, 'destroy']);
    } 
);

Route::get('/todo_liste/{id}', [ListesController::class, 'todoListe']);
