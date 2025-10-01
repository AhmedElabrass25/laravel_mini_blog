<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6); //select * from posts
        // return Auth::user();
        // dd($posts);
        return view('posts.index')->with('posts', $posts);
    }
    public function detailsPost($id)
    {
        // model elequant
        $post = Post::findOrFail($id); //select id from posts where id =$id
        $comments = $post->comments;
        // dd($comments);
        return view('posts.postDetails')->with(['post' => $post, 'comments' => $comments]);
    }
    //create || insert 
    // it is needs two methods
    // 1. create form
    // 2. store data
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->file('image'));
        // validation
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);
        return redirect('/posts')->with('success', 'Post created successfully');
    }
    // Update data
    // needs two methods (edit view and update logic)
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        // if no image is selected, keep the existing image
        // $imagePath = $request->oldImage;
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }
        $post->save();
        return redirect('/posts')->with('success', 'Post updated successfully');
    }
    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Storage::disk('public')->delete($post->image);

        return redirect('/posts')->with('success', 'Post deleted successfully');
    }
    // display user posts
    public function display()
    {
        $id = Auth::id();
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(9);
        return view('posts.myPosts')->with('posts', $posts);
    }
}
