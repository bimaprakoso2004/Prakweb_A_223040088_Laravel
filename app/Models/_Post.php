<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model
{
    // Dummy data representing posts
    public static function allPosts()
    {
        return [
            [
                'id' => 1,
                'title' => 'Judul Artikel 1',
                'author' => 'Anin Deninadia',
                'slug' => 'judul-artikel-1',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda nostrum voluptatibus id tempora aspernatur quibusdam, numquam commodi nemo animi ullam.'
            ],
            [
                'id' => 2,
                'title' => 'Judul Artikel 2',
                'author' => 'Anin Deninadia',
                'slug' => 'judul-artikel-2',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa reiciendis laboriosam cum doloremque veritatis veniam.'
            ],
        ];
    }

    // Find a post by slug
    public static function findBySlug($slug): array
    {
        // Search the array for the post with the given slug
        $post = Arr::first(static::allPosts(), fn ($post) => $post['slug'] === $slug);

        // If the post is not found, throw a 404 error
        if (!$post) {
            abort(404);
        }

        return $post;
    }
}

?>