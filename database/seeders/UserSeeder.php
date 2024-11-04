<?php

namespace Database\Seeders;

use App\Models\User; // Impor model User
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 5 user menggunakan factory
        User::factory(5)->create();
    }
}