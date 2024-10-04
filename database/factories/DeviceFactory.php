<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\Devtype;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => ucfirst($this->faker->words(2, true)),
      'status' => $this->faker->boolean(),
      'brand_id' => Brand::query()->inRandomOrder()->value('id'),
      'devtype_id' => Devtype::query()->inRandomOrder()->value('id'),
      // 'price' => $this->faker->numberBetween(40, 100),
    ];
  }
}
