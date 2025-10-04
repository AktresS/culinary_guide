<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\DishControllerApi;
use App\Http\Controllers\IngredientControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::get('/dish/{id}', [DishControllerApi::class, 'show']);
Route::get('/dishes', [DishControllerApi::class, 'index']);
Route::get('/dishes_total', [DishControllerApi::class, 'total']);

Route::get('/category', [CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [CategoryControllerApi::class, 'show']);
Route::get('/categories_total', [CategoryControllerApi::class, 'total']);

Route::get('/ingredient', [IngredientControllerApi::class, 'index']);
Route::get('/ingredient/{id}', [IngredientControllerApi::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request){
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});
