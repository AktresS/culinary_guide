<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\IngredientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return view('hello', ['title' => 'Hello World!']);
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
Route::get('/dishes/{dish}', [DishController::class, 'show'])->name('dishes.show');
Route::get('/dishes/{dish}/ingredients', [DishController::class, 'showIngredients'])->name('dishes.showIngredients');

Route::get('/ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show');
