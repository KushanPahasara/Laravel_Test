<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categories::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Category created successfully!'], 201);
    }

    // Get all categories
    public function index()
    {
        $categories = Categories::all(); // Retrieves all categories
        return response()->json($categories);
    }

    // Get a specific category by ID
    public function show($id)
    {
        $category = Categories::findOrFail($id); // Find the category by ID or return 404
        return response()->json($category);
    }

    // Update a specific category by ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Categories::findOrFail($id); // Find the category by ID
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Category updated successfully!']);
    }

    // Delete a specific category by ID
    public function destroy($id)
    {
        $category = Categories::findOrFail($id); // Find the category by ID
        $category->delete(); // Delete the category

        return response()->json(['message' => 'Category deleted successfully!']);
    }
}
