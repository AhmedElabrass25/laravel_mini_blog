@extends('layouts.layout')
@section('content')
<section>
  <div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
      <h1 class="text-2xl font-bold text-gray-800 mb-6">Update Post</h1>

      <!-- Update Post Form -->
      <form action="{{ route('postUpdate', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
          <label for="title" class="block text-gray-700 font-semibold mb-2">Post Title</label>
          <input 
            type="text" 
            id="title" 
            name="title" 
            value="{{ old('title', $post->title) }}"
            class="w-full border rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('title') border-red-500 @enderror"
            placeholder="Enter post title">
          @error('title')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Body -->
        <div>
          <label for="body" class="block text-gray-700 font-semibold mb-2">Post Content</label>
          <textarea 
            id="body" 
            name="body" 
            rows="6" 
            class="w-full border rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('body') border-red-500 @enderror"
            placeholder="Write your post here...">{{ old('body', $post->body) }}</textarea>
          @error('body')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Image -->
        <div>
          <label for="image" class="block text-gray-700 font-semibold mb-2">Upload Image</label>
          <input 
            type="file" 
            id="image" 
            name="image" 
            class="w-full border rounded-md p-2 file:mr-3 file:py-2 file:px-4 file:border-0 file:bg-blue-600 file:text-white file:rounded-md hover:file:bg-blue-700 @error('image') border-red-500 @enderror">
          @error('image')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Old Image Preview -->
        <div class="w-[120px] h-[120px]">
          <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover rounded" alt="post image">
        </div>

        <!-- Submit Button -->
        <div class="text-right">
          <button 
            type="submit" 
            name="submit"
            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Update Post
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection

@section('title')
<title>Update Post</title>
@endsection
