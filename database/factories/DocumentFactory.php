<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_full' => ucfirst($this->faker->words(6, true)),
            'name' => ucfirst($this->faker->words(2, true)),
            'unit_id' => Unit::query()->inRandomOrder()->value('id'),
            'income_at' =>  $this->faker->dateTime()->format('Y-m-d'),
            'income' => $this->faker->numberBetween(1111,9999)
  
        ];
    }
}
