<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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


Route::prefix('/v1')->group(function (){

    Route::get('/tasks', [TaskController::class, 'index'])->name('api.v1.tasks');

    Route::prefix('/task')/*->middleware('auth:sanctum')*/->group(function (){

        Route::post('/add', [TaskController::class, 'store'])->name('api.v1.tasks.add');

        Route::post('/{id}/update', [TaskController::class, 'update'])->name('api.v1.tasks.update');

        Route::delete('/{id}/delete', [TaskController::class, 'destroy'])->name('api.v1.tasks.delete');
    });
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
