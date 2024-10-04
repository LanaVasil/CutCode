<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name_full' => ucfirst($this->faker->words(4, true)),
          'name' => ucfirst($this->faker->words(2, true)),
          'status' => $this->faker->boolean(),
          'sort' => $this->faker->numberBetween(1, 99)    
        ];
    }
}
