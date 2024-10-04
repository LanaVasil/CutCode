<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\State;
use App\Models\Unit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_full' => $this->faker->name(),
            'name' => $this->faker->lastName(),
            'gender' => $this->faker->boolean(),
            'state_id' => State::query()->inRandomOrder()->value('id'),
            'cellphone' => '+38095' .$this->faker->unique()->numberBetween(1111111,9999999),
            'phone' => $this->faker->numberBetween(1111,9999),
            'email' => $this->faker->email(),
            'unit_id' => Unit::query()->inRandomOrder()->value('id')
          ];
    }
}
