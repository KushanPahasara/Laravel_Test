<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    // Store a new issue
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

    // Get all issues
    public function index()
    {
        $issues = Issues::all(); // Retrieves all issues
        return response()->json($issues);
    }

    // Get a specific issue by ID
    public function show($id)
    {
        $issue = Issues::findOrFail($id); // Find the issue by ID or return 404
        return response()->json($issue);
    }

    // Update a specific issue by ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'uuid' => 'required|integer',
            'slug' => 'required|string|unique:issues,slug,' . $id,
        ]);

        $issue = Issues::findOrFail($id); // Find the issue by ID
        $issue->update([
            'title' => $request->title,
            'body' => $request->body,
            'uuid' => $request->uuid,
            'slug' => $request->slug,
        ]);

        return response()->json(['message' => 'Issue updated successfully!']);
    }

    // Delete a specific issue by ID
    public function destroy($id)
    {
        $issue = Issues::findOrFail($id); // Find the issue by ID
        $issue->delete(); // Delete the issue

        return response()->json(['message' => 'Issue deleted successfully!']);
    }
}
