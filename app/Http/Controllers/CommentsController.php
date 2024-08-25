<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    // Store a new comment
    public function store(Request $request)
    {
        $request->validate([
            'issue_id' => 'required|integer',
            'body' => 'required|string',
        ]);

        Comments::create([
            'issue_id' => $request->issue_id,
            'body' => $request->body,
        ]);

        return response()->json(['message' => 'Comment created successfully!'], 201);
    }

    // Get all comments
    public function index()
    {
        $comments = Comments::all(); // Retrieves all comments
        return response()->json($comments);
    }

    // Get a specific comment by ID
    public function show($id)
    {
        $comment = Comments::findOrFail($id); // Find the comment by ID or return 404
        return response()->json($comment);
    }

    // Update a specific comment by ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'issue_id' => 'required|integer',
            'body' => 'required|string',
        ]);

        $comment = Comments::findOrFail($id); // Find the comment by ID
        $comment->update([
            'issue_id' => $request->issue_id,
            'body' => $request->body,
        ]);

        return response()->json(['message' => 'Comment updated successfully!']);
    }

    // Delete a specific comment by ID
    public function destroy($id)
    {
        $comment = Comments::findOrFail($id); // Find the comment by ID
        $comment->delete(); // Delete the comment

        return response()->json(['message' => 'Comment deleted successfully!']);
    }
}
