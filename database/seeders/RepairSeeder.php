<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Repair;
use App\Models\Unit;
use App\Models\Worker;

class RepairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Repair::factory(20)
        ->has(Unit::factory(rand(1, 4)))
        ->has(Worker::factory(rand(1, 3)))
        ->create();  
    }
}
