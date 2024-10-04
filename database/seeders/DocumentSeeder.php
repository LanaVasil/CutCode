<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Document; 
use App\Models\Unit; 

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document::factory(20)
        ->has(Unit::factory(rand(1, 3)))
        ->create();  
    }
}
