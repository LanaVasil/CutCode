<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;
use App\Models\Worker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repair>
 */
class RepairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note' => ucfirst($this->faker->words(6, true)),
            'content' => ucfirst($this->faker->words(2, true)),
            'unit_id' => Unit::query()->inRandomOrder()->value('id'),
            'worker_id' => Worker::query()->inRandomOrder()->value('id'),
            'status' => $this->faker->boolean()
        ];
    }
}
