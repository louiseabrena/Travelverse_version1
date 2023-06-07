<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminUser>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => 'password',
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'bio' => $this->faker->sentence(),
            'remember_token' => Str::random(10),
        ];
    }
}
