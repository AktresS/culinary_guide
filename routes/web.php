<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return view('hello', ['title' => 'Hello World!']);
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('auth');


Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create')->middleware('auth');
Route::post('/dishes', [DishController::class, 'store'])->name('dishes.store')->middleware('auth');

Route::get('/dishes/{dish}', [DishController::class, 'show'])->name('dishes.show');
Route::get('/dishes/{dish}/ingredients', [DishController::class, 'showIngredients'])->name('dishes.showIngredients');

Route::get('/dishes/{dish}/edit', [DishController::class, 'edit'])->name('dishes.edit')->middleware('auth');
Route::patch('/dishes/{dish}', [DishController::class, 'update'])->name('dishes.update')->middleware('auth');

Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy')->middleware('auth');

Route::get('/ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('auth');


Route::get('/error', function (){
    return view('error', ['message' => session('message')]);
});
