
@extends('layouts.layout')
@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="w-full flex justify-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">My Posts</h1>
    </div>

    @if($posts->count())
    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
            <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="w-full h-48 object-cover">
            <div class="p-4 flex flex-col flex-1">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ $post->body }}
                </p>
                <!-- Action Buttons -->
                <div class="mt-auto flex justify-between items-center">
                    <span class="text-sm text-gray-500">By: {{ $post->user->name }}</span>
                    <a href="{{ route('postDetails',$post->id) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                        View
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="my-8">
        {{ $posts->links() }}
    </div>
    @else
        <p class="text-center text-gray-500 text-lg">You don’t have any posts yet.</p>
    @endif
</div>

@endsection

@section('title')
<title>User Posts</title>
@endsection
