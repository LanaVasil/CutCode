<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Worker; 
use App\Models\State; 

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // створюємо 20-Device и для кожного рандомно від 1 до 3 - Brand
           Worker::factory(20)
    ->has(State::factory(rand(1, 3)))
    ->create();     
    }
}
