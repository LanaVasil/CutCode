<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unitype;

class UnitypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // ['name' => 'МВСУ', 'sort' => '2'],
    // ['name' => 'регіон', 'sort' => '4'],      
    // ['name' => 'відділи', 'sort' => '9'],
    $data = [
      ['name' => '', 'sort' => '1'],
      ['name' => 'НПУ', 'sort' => '3'],
      ['name' => 'ВОМТОП', 'sort' => '6']
    ];

    foreach ($data as $row) {
      Unitype::create($row);
    }
  }
}
