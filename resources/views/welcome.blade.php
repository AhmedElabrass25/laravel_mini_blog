{{-- @extends('layouts.layout');
@section('content')
    
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
  <div class="container mx-auto text-center">
    <h1 class="text-5xl font-bold mb-4">Welcome to MiniBlog</h1>
    <p class="text-lg mb-6">A simple blog where you can share your thoughts and ideas.</p>
    <a href="{{ url('/posts') }}" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded-md hover:bg-gray-100">
View All Posts
</a>
</div>
</section>

<!-- Featured Posts -->
<section class="py-12 bg-gray-50">
  <div class="container mx-auto px-4">
  </div>
</section>

@endsection
@section('title')
<title>MiniBlog</title>
@endsection --}}
@extends('layouts.layout')

@section('title')
<title>MiniBlog</title>
@endsection

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
  <div class="container mx-auto text-center px-4">
    <h1 class="text-5xl font-bold mb-4">Welcome to MiniBlog</h1>
    <p class="text-lg mb-6">A simple blog where you can share your thoughts and ideas.</p>
    <a href="{{ url('/posts') }}" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded-md shadow-md hover:bg-gray-100 transition duration-300">
      View All Posts
    </a>
  </div>
</section>

<!-- Featured Posts -->
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Featured Posts</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Example Post Card -->
      <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition duration-300">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Post Title Example</h3>
        <p class="text-gray-600 mb-4">This is a short description of the blog post to grab attention.</p>
        <a href="{{ url('#') }}" class="text-blue-600 font-medium hover:underline">Read More →</a>
      </div>

      <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition duration-300">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Another Post</h3>
        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="{{url('#') }}" class="text-blue-600 font-medium hover:underline">Read More →</a>
      </div>

      <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition duration-300">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Third Post Highlight</h3>
        <p class="text-gray-600 mb-4">Even more engaging text here to encourage clicks and reading.</p>
        <a href="{{ url('#') }}" class="text-blue-600 font-medium hover:underline">Read More →</a>
      </div>
    </div>
  </div>
</section>

@endsection