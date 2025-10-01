{{-- 
@extends('layouts.layout')
@section('content')

<section>
    <div class="container mx-auto px-4 py-6"> --}}

    <!-- Page Header -->
    {{-- <div class="flex justify-center items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 text-center">All Posts</h1>   
    </div>
    @if($message=Session::get('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <p class="text-sm">{{$message}}</p>
    </div>
    @endif

    <!-- Posts List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Single Post Card -->
            @foreach($posts as $post)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{asset('storage/'.$post->image)}}" alt="Post Image" class="w-full h-48 object-cover">
            <div class="p-4 flex-col justify-between items-between">
                <h2 class="text-xl font-semibold mb-2">{{$post->title}}</h2>
                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{$post->body}}
                </p>
                <!-- Action Buttons -->
                <div class="flex justify-end items-center">
                    {{-- {{route('postEdit',$post->id)}} --}}
                    {{-- <a href="{{route('postDetails',$post->id)}}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-md cursor-pointer">
                        View
                    </a>
                </div>
            </div>
        </div>
        @endforeach
      


    </div> --}}
    {{-- Pagination --}}
{{-- <div class="my-5">{{$posts->links()}}</div>
</div>
</section>

@endsection

@section("title")
<title>Home page</title>
@endsection --}}
@extends('layouts.layout')

@section('title')
    <title>All Posts</title>
@endsection

@section('content')
<section class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4">

        <!-- Page Header -->
        <div class="flex justify-center items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 border-b-4 border-blue-600 pb-2">All Posts</h1>
        </div>

        <!-- Success Message -->
        @if($message = Session::get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 shadow-md">
                <p class="text-sm font-medium">{{ $message }}</p>
            </div>
        @endif

        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 overflow-hidden flex flex-col">
                    
                    <!-- Post Image -->
                    <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="w-full h-48 object-cover">
                    
                    <!-- Post Content -->
                    <div class="p-5 flex flex-col flex-grow">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $post->body }}
                        </p>

                        <!-- Actions -->
                        <div class="mt-auto flex justify-end items-center">

                            <!-- View Button -->
                            <a href="{{ route('postDetails', $post->id) }}" 
                               class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-md transition">
                                View Details →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $posts->links() }}
        </div>

    </div>
</section>
@endsection

