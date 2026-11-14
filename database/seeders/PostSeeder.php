<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Chirp;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Create a few sample users if they don't exist
        $users = User::count() < 3
				    ? collect([
				        User::create([
				            'name' => 'Alice Developer',
				            'email' => 'alice@example.com',
				            'password' => bcrypt('password'),
				        ]),
				        User::create([
				            'name' => 'Bob Builder',
				            'email' => 'bob@example.com',
				            'password' => bcrypt('password'),
				        ]),
				        User::create([
				            'name' => 'Charlie Coder',
				            'email' => 'charlie@example.com',
				            'password' => bcrypt('password'),
				        ]),
				    ])
				    : User::take(3)->get();

        // Sample chirps
        $posts = [
            [
                'title' => 'laravel post 1',
                'description' => 'Just discovered Laravel - where has this been all my life? 🚀',
            ],
            [
                'title' => 'second laravel post',
                'description' => 'Building something cool with Chirper today!',
            ],
            [
                'title' => '3rd laravel post',
                'description' => 'Laravel\'s Eloquent ORM is pure magic ✨',
            ],
            [
                'title' => 'laralve ah',
                'description' => 'Deployed my first app with Laravel Cloud. So smooth!',
            ],
            [
                'title' => 'blade comps',
                'description' => 'Who else is loving Blade components?',
            ],
            [
                'title' => 'fly day!',
                'description' => 'Friday deploys with Laravel? No problem! 😎',
            ],
        ];

        // Create chirps for random users
        foreach ($posts as $post) {
            $users->random()->posts()->create([
                'title' => $post['title'],
                'description' => $post['description'],
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}