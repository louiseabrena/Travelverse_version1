<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Blog::truncate();
        Topic::truncate();
        Comment::truncate();
        
        User::factory()->count(5)->create();
        Topic::factory()->count(5)->create();
        Blog::factory()->count(10)->create();
        Comment::factory()->count(3)->create();
    }
}
