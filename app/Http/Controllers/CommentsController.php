<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
   
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

   
    public function index()
    {
        $comments = Comments::all(); 
        return response()->json($comments);
    }

   
    public function show($id)
    {
        $comment = Comments::findOrFail($id);
        return response()->json($comment);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'issue_id' => 'required|integer',
            'body' => 'required|string',
        ]);

        $comment = Comments::findOrFail($id); 
        $comment->update([
            'issue_id' => $request->issue_id,
            'body' => $request->body,
        ]);

        return response()->json(['message' => 'Comment updated successfully!']);
    }

    
    public function destroy($id)
    {
        $comment = Comments::findOrFail($id); 
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully!']);
    }
}
