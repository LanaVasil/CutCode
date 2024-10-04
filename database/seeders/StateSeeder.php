<?php

namespace Database\Seeders;

use App\Models\State;
use App\Models\Post;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // створюємо 13-State и для кожного рандомно від 1 до 3 - Post
        State::factory(13)
        ->has(Post::factory(rand(1, 3)))
        ->has(Unit::factory(rand(1, 2)))
        ->create();
    }
}
