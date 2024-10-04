<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Repdevice;
use App\Models\Repair;
use App\Models\Device;
use App\Models\Worker;
use App\Models\Document;

class RepdeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Repdevice::factory(20)
      ->has(Repair::factory(rand(1, 2)))
      ->has(Device::factory(rand(1, 40)))
      ->has(Worker::factory(rand(1, 3)))
      ->has(Document::factory(rand(1, 4)))
      ->create();  
    }
}
