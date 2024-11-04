<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user secara manual
        User::create([
            'name' => 'Anin Deninadia',
            'username' => 'anindeninadia',
            'email' => 'anindeninadia@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Menggunakan Hash::make
            'remember_token' => Str::random(10)   // Menggunakan Str::random
        ]);

        // Membuat category secara manual
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        // Membuat post secara manual
        Post::create([
            'title' => 'Judul Artikel 1',
            'author_id' => 1,  // Mengacu pada user pertama
            'category_id' => 1, // Mengacu pada kategori pertama
            'slug' => 'judul-artikel-1',
            'body' => 'It was a concerning development that he couldn\'t get out of his mind...'
        ]);

        // Membuat 5 user dan 3 category secara otomatis, lalu menggunakan recycle untuk post
        $categories = Category::factory(3)->create();
        $users = User::factory(5)->create();

        // Membuat 100 post menggunakan factory
        Post::factory(100)
            ->recycle($categories)  // Recycle categories yang sudah dibuat
            ->recycle($users)       // Recycle users yang sudah dibuat
            ->create();
    }
}