<?php

use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\DishControllerApi;
use App\Http\Controllers\IngredientControllerApi;
use Illuminate\Support\Facades\Route;

Route::get('/dish', [DishControllerApi::class, 'index']);
Route::get('/dish/{id}', [DishControllerApi::class, 'show']);

Route::get('/category', [CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [CategoryControllerApi::class, 'show']);

Route::get('/ingredient', [IngredientControllerApi::class, 'index']);
Route::get('/ingredient/{id}', [IngredientControllerApi::class, 'show']);
