<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
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

   
    public function index()
    {
        $categories = Categories::all(); 
        return response()->json($categories);
    }

    
    public function show($id)
    {
        $category = Categories::findOrFail($id); 
        return response()->json($category);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Categories::findOrFail($id); 
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Category updated successfully!']);
    }

    
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete(); 

        return response()->json(['message' => 'Category deleted successfully!']);
    }
}
