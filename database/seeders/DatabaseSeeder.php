<?php

namespace Database\Seeders;

use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Appu',
            'email' => 'appu@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);

        // Blog::factory()
        //     ->count(30)
        //     ->create();
    }
}
