<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield("title")
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <!-- Navbar Design for Mini Blog -->
<nav class="bg-white sticky top-0 z-50 drop-shadow-md">
  <div class="container mx-auto flex justify-between items-center p-4">
    <!-- Logo -->
    <div>
      <a href="{{route('home')}}" class="text-2xl font-bold text-blue-600">MiniBlog</a>
    </div>

    <!-- Links -->
    <div class="flex items-center gap-6">
      <!-- All Posts Dropdown -->
      <div class="relative group">
        <a href="{{route('allPosts')}}" class="px-3 py-2 font-semibold text-gray-700 hover:text-blue-600 flex items-center gap-1">
         All Posts
        </a>

      </div>
      {{-- My Posts --}}
        <a href="{{route('myPosts')}}" class="px-3 py-2 font-semibold text-gray-700 hover:text-blue-600">
        My Posts
      </a>
    
      @auth
        <!-- Create Post Link -->
      <a href="{{route('postCreate')}}" class="px-3 py-2 font-semibold text-gray-700 hover:text-blue-600">
        Create Post
      </a>
      {{-- Profile --}}
       <a href="{{route('profile.edit')}}" class="px-3 py-2 font-semibold text-gray-700 hover:text-blue-600">
        Profile
    </a>
      <!-- User Name -->
      <h2 class="px-3 py-2 font-semibold text-gray-700 hover:text-blue-600">Hello {{Auth::user()->name}}</h2>

     
      <!-- Logout Button -->
      <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit" class="px-3 py-2 font-semibold bg-red-600 hover:bg-red-700 rounded-md text-white">Logout</button>
      </form>
          
      @endauth
      @guest
            <!-- Login Button -->
            <a href="{{route('login')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
              Login
            </a>
               <a href="{{route('register')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
              Register
            </a>
      @endguest
   
    </div>
  </div>
</nav>
@yield('content');
</body>
</html>