<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;

// Public Routes
Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', [
        'name' => 'Anin Deninadia',
        'title' => 'About'
    ]);
});

Route::get('/posts', function () {
    $posts = Post::latest();

    if (request('search')) {
        $posts = $posts->where('title', 'like', '%' . request('search') . '%');
    }

    $posts = Post::with(['author', 'category'])->latest()->get();

    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/authors/{user:username}', function (User $user) {
    $posts = $user->posts->load('category', 'author');

    return view('posts', [
        'title' => count($posts) . ' Articles by ' . $user->name,
        'posts' => $posts
    ]);
});

Route::get('/posts/{slug}', function ($slug) {
    $post = Arr::first(Post::all(), function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

// Login Routes
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

// Register Routes
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Category Routes
    Route::resource('/dashboard/categories', AdminCategoryController::class);
});