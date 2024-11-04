<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardPostController extends Controller
{
    // Menampilkan formulir untuk membuat postingan baru
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Create New Post',
        ]);
    }

    // Menyimpan postingan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => 'required|string|unique:posts,slug',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $request->slug,
        ]);

        return redirect('/dashboard/posts')->with('success', 'Post created successfully!');
    }

    // Menampilkan formulir untuk mengedit postingan
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'title' => 'Edit Post',
            'post' => $post,
        ]);
    }

    // Mengupdate postingan di database
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => 'required|string|unique:posts,slug,' . $post->id,
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $request->slug,
        ]);

        return redirect('/dashboard/posts')->with('success', 'Post updated successfully!');
    }

    // Menghapus postingan
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/dashboard/posts')->with('success', 'Post deleted successfully!');
    }
}