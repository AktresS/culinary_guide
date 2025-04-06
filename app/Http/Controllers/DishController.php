<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dishes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'integer|required',
            'cooking_method' => 'required',
            'cooking_time' => 'required|integer',
        ]);
        Dish::create($validated);
        return redirect()->route('dishes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return view('dishes.show', compact('dish'));
    }

    public function showIngredients(Dish $dish)
    {
        return view('dishes.showIngredients', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $categories = Category::all();
        return view('dishes.edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'integer|required',
            'cooking_method' => 'required',
            'cooking_time' => 'required|integer',
        ]);
        $dish->update($validated);
        return redirect()->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index');
    }
}
