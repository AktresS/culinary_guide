<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\DishControllerApi;
use App\Http\Controllers\IngredientControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request){
//    return $request->user();
//});
//
//Route::middleware(['auth:sanctum'])->get('/logout', [AuthController::class, 'logout']);
//
//Route::middleware('auth:sanctum')->get('/dish', [DishControllerApi::class, 'index']);
Route::get('/dish/{id}', [DishControllerApi::class, 'show']);

Route::get('/category', [CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [CategoryControllerApi::class, 'show']);

Route::get('/ingredient', [IngredientControllerApi::class, 'index']);
Route::get('/ingredient/{id}', [IngredientControllerApi::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dish', [DishControllerApi::class, 'index']);
    Route::get('/user', function (Request $request){
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});
