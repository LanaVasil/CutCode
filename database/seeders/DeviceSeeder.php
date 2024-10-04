<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // створюємо 20-Device и для кожного рандомно від 1 до 3 - Brand
    Device::factory(50)
      ->has(Brand::factory(rand(1, 12)))
      ->create();      
  }
}
