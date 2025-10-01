<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/send-mail', [UserController::class, 'sendMail']);

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/users', [UserController::class, 'index']);
Route::controller(PostController::class)->group(function () {

    Route::get('/posts', 'index')->name('allPosts');
    Route::get('/post/create', 'create')->name('postCreate')->middleware('auth');
    Route::get('/myPosts', 'display')->name('myPosts')->middleware('auth');
    Route::post('/post/store', 'store')->name('postsStore');
    Route::get('/post/{id}', 'detailsPost')->name('postDetails');
    Route::get('/post/edit/{id}', 'edit')->name('postEdit');
    Route::put('/post/update/{id}', 'update')->name('postUpdate');
    Route::delete('/post/{id}', 'deletePost')->name('postDelete');
});
Route::controller(CommentController::class)->group(function () {
    Route::post('/post/{id}/comment', 'create')->name("createComment");
    Route::delete('/comment/{id}', 'delete')->name("deleteComment");
});
//make like 
Route::post('/posts/{id}/like', [LikeController::class, 'store'])
    ->middleware('auth')
    ->name('posts.like');

require __DIR__ . '/auth.php';
