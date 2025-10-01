<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function create(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'content' => 'required|string|max:255',
        ]);
        $post->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
        return back()->with("success", "Comment is added successfully");
    }
    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back()->with("success", "comment is deleted successfully");
    }
    //
}
