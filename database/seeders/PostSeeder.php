<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // створюємо 30-Post и для кожного рандомно від 1 до 3 - Brand
            Post::factory(30)
    // ->has(Post::factory(rand(1, 3)))
    ->create();
    }
}
