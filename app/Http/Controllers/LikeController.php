<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($postId)
    {
        $post = Post::findOrFail($postId);

        // لو المستخدم عمل لايك قبل كده، نشيله (toggle like)
        $like = Like::where('post_id', $postId)
            ->where('user_id', auth()->id())
            ->first();

        if ($like) {
            $like->delete();
            return back()->with('success', 'Like removed');
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $postId,
            ]);
            return back()->with('success', 'Post liked');
        }
    }
}
