<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Blog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'readerName' => $this->faker->firstName(),
            'commentContent' => $this->faker->sentence(),
            'user_id' => User::all()->random(),
            'blog_id' => Blog::all()->random(),
        ];
    }
}
