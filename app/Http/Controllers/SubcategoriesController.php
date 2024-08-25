<?php

namespace App\Http\Controllers;

use App\Models\Subcategories;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    
    public function index()
    {
        return response()->json(Subcategories::all());
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subcategory = Subcategories::create($validatedData);

        return response()->json($subcategory, 201);
    }

   
    public function show($id)
    {
        $subcategory = Subcategories::findOrFail($id);
        return response()->json($subcategory);
    }

    
    public function update(Request $request, $id)
    {
        $subcategory = Subcategories::findOrFail($id);

        $validatedData = $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subcategory->update($validatedData);

        return response()->json($subcategory);
    }

   
    public function destroy($id)
    {
        $subcategory = Subcategories::findOrFail($id);
        $subcategory->delete();

        return response()->json(null, 204);
    }
}

