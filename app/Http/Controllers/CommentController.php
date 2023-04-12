<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    // public function index()
    // {
    //     $comments = Comment::all();
    //     return response()->json($comments);
    // }

    
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->validated());
        return response()->json($comment);
    }

    
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
    }

    public function showByGradebookId(string $gradebook_id)
    {
        $comments = Comment::where('gradebook_id', $gradebook_id)->get();
       
        return response()->json($comments);
    }


    // public function show(string $id)
    // {
    //     $comment = Comment::findOrFail($id);
    //     $gradebook = $comment->gradebook;
    //     $user = $comment->user;
        
    //     return response()->json($comment);
    // }

    
    // public function update(Request $request, string $id)
    // {
    //     $comment = Comment::findOrFail($id);
    //     $comment->update($request->validated());
    //     return response()->json($comment);
    // }
   
}
