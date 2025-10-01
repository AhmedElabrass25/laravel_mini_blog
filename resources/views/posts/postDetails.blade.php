
@extends('layouts.layout')

@section('title')
<title>Post Details</title>
@endsection

@section('content')
<section>
  <div class="container mx-auto px-4 py-8">

    <!-- Success Message -->
    @if($message = Session::get('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow-md">
        <p class="text-sm font-medium">{{ $message }}</p>
      </div>
    @endif

    <!-- Post Card -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-3xl mx-auto flex flex-col">

      <!-- Post Content -->
      <div class="p-6 flex flex-col flex-1">
        <p class="mb-3 text-gray-600 text-sm">By <span class="font-semibold">{{ $post->user->name }}</span></p>
        
        <img src="{{ asset('storage/' . $post->image) }}" 
             alt="Post Image" 
             class="mb-4 w-full h-fit rounded-md object-cover shadow">

        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

        <p class="text-gray-700 leading-relaxed mb-6">
          {{ $post->body }}
        </p>

        <!-- Like Button -->
        <form action="{{ route('posts.like', $post->id) }}" method="POST" class="mb-4">
          @csrf
          <button type="submit" 
                  class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
            👍 Like <span>({{ $post->likes->count() }})</span>
          </button>
        </form>

        <!-- Action Buttons -->
        @if($post->user_id === auth()->id())
        <div class="flex justify-end gap-3 mt-auto">
          <a href="{{ route('postEdit', $post->id) }}" 
             class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">
            Update
          </a>
          <form action="{{ route('postDelete', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md"
                    onclick="return confirm('Are you sure to delete this post?')">
              Delete
            </button>
          </form>
        </div>
        @endif
      </div>
    </div>

    <!-- Comments Section -->
    <div class="max-w-3xl mx-auto mt-10 bg-white rounded-lg shadow-md p-6">
      <h2 class="text-xl font-bold mb-4 border-b pb-2">Comments</h2>

      <!-- Add Comment Form -->
      <form action="{{ route('createComment', $post->id) }}" method="POST" class="mb-6">
        @csrf
        <textarea name="content" rows="3" 
                  class="w-full border rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-300" 
                  placeholder="Write your comment here..."></textarea>
        @error('content')
          <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
        @enderror
        <button type="submit" 
                class="mt-3 px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
          Add Comment
        </button>
      </form>

      <!-- Display Comments -->
      @if(count($comments) > 0)
        <h3 class="text-lg font-semibold mb-4">({{ count($comments) }}) Comments</h3>
        @foreach ($comments as $comment)
          <div class="border rounded-md p-4 mb-4 shadow-sm bg-gray-50">
            <div class="flex justify-between items-center">
              <p class="text-gray-800">
                <span class="font-semibold">{{ $comment->user->name }}:</span> 
                {{ $comment->content }}
              </p>
              @if($comment->user_id === auth()->id())
              <form action="{{ route('deleteComment', $comment->id) }}" method="POST" 
                    onsubmit="return confirm('Are you sure to delete this comment?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-4 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded-md">
                  Delete
                </button>
              </form>
              @endif
            </div>
            <p class="text-xs text-gray-500 mt-2">Posted on {{ $comment->created_at->format('d M Y - H:i') }}</p>
          </div>
        @endforeach
      @else
        <div class="bg-gray-100 p-6 rounded-md text-center">
          <p class="text-gray-600 text-lg mb-3">No comments yet.</p>
          <a href="{{ route('allPosts') }}" 
             class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700">
            ← Back to Posts
          </a>
        </div>
      @endif
    </div>

  </div>
</section>
@endsection
