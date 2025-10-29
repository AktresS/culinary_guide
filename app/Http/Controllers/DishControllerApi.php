<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Image;
use App\Models\Step;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(Dish::with(['category', 'images'])->limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))->get());
    }

    public function total()
    {
        return response(Dish::all()->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cooking_time' => 'required|integer|min:1',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'steps' => 'required|array|min:1',
            'steps.*.description' => 'required|string',
            'steps.*.timer_duration' => 'nullable|integer|min:0',
            'steps.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mainImageFile = $request->file('main_image');
        $mainFileName = rand(1, 100000) . '_' . $mainImageFile->getClientOriginalName();
        try {
            $path = Storage::disk('s3')->putFileAs('dishes', $mainImageFile, $mainFileName);
            $mainImageUrl = Storage::disk('s3')->url($path);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 2,
                'message' => 'Failed to upload main image: ' . $e->getMessage(),
            ], 500);
        }


        $dish = Dish::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'cooking_time' => $validated['cooking_time'],
            'user_id' => Auth::user()->id,
        ]);

        Image::create([
            'path' => $mainImageUrl,
            'dish_id' => $dish->id,
            'user_id' => auth()->id(),
            'is_main' => true,
        ]);

        foreach ($validated['steps'] as $index => $stepData) {
            $stepImageId = null;
            if ($request->hasFile("steps.{$index}.image")) {
                $stepImageFile = $request->file("steps.{$index}.image");
                $stepFileName = rand(1, 100000) . '_' . $stepImageFile->getClientOriginalName();
                try {
                    $stepPath = Storage::disk('s3')->putFileAs('steps', $stepImageFile, $stepFileName);
                    $stepImageUrl = Storage::disk('s3')->url($stepPath);
                    $stepImage = Image::create([
                        'path' => $stepImageUrl,
                        'dish_id' => $dish->id,
                        'user_id' => auth()->id(),
                        'is_main' => false,
                    ]);
                    $stepImageId = $stepImage->id;
                } catch (\Exception $e) {
                    $dish->delete();
                    return response()->json([
                        'code' => 2,
                        'message' => "Failed to upload step image at index {$index}: " . $e->getMessage(),
                    ], 500);
                }
            }
            Step::create([
                'dish_id' => $dish->id,
                'step_number' => $index + 1,
                'description' => $stepData['description'],
                'timer_duration' => $stepData['timer_duration'] ?? null,
                'image_id' => $stepImageId,
            ]);
        }

        return response()->json([
            'code' => 0,
            'message' => 'Dish created successfully',
            'dish_id' => $dish->id,
            'dish' => $dish->load(['images', 'steps']),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Dish::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
