<?php

namespace Database\Seeders;

use App\Models\Structure;
use App\Models\Unit;
// use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                    // створюємо 30-Structure и для кожного рандомно від 1 до 3 - Post
                    Structure::factory(10)
                    ->has(Unit::factory(rand(1, 3)))
                    // ->has(Post::factory(rand(1, 3)))
                    ->create();
    }
}
