<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'uuid' => 'required|integer',
            'slug' => 'required|string|unique:issues,slug',
        ]);

        Issues::create([
            'title' => $request->title,
            'body' => $request->body,
            'uuid' => $request->uuid,
            'slug' => $request->slug,
        ]);

        return response()->json(['message' => 'Issue created successfully!'], 201);
    }

    public function index()
    {
        $issues = Issues::all(); 
        return response()->json($issues);
    }


    public function show($id)
    {
        $issue = Issues::findOrFail($id); 
        return response()->json($issue);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'uuid' => 'required|integer',
            'slug' => 'required|string|unique:issues,slug,' . $id,
        ]);

        $issue = Issues::findOrFail($id); 
        $issue->update([
            'title' => $request->title,
            'body' => $request->body,
            'uuid' => $request->uuid,
            'slug' => $request->slug,
        ]);

        return response()->json(['message' => 'Issue updated successfully!']);
    }

    
    public function destroy($id)
    {
        $issue = Issues::findOrFail($id); 
        $issue->delete(); 

        return response()->json(['message' => 'Issue deleted successfully!']);
    }

    public function attachCategories(Request $request, $issueId)
{
    $issue = Issues::findOrFail($issueId);

    $validatedData = $request->validate([
        'category_ids' => 'required|array',  
        'category_ids.*' => 'exists:categories,id', 
    ]);

    
    $issue->categories()->attach($validatedData['category_ids']);

    return response()->json(['message' => 'Issue_categories add successfully!'], 201);
}
}
