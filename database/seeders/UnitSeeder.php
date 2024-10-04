<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $data = [
        ['name_full' => 'Департартамент забезпечення діяльності Голови', 'name' => 'ДЗД Голови', 'unitype_id' => '3', 'sort' => '110', 'parent_id' => '0'],
        ['name_full' => 'Департамент карного розшуку', 'name' => 'ДКР', 'unitype_id' => '3', 'sort' => '200', 'parent_id' => '0'],
        ['name_full' => 'Департамент боротьби зі злочинами, пов’язаними з торгівлею людьми', 'name' => 'ДБЗПТЛ', 'unitype_id' => '3', 'sort' => '60', 'parent_id' => '0'],
        ['name_full' => 'ЦОП', 'name' => 'ЦОП', 'unitype_id' => '3', 'sort' => '60', 'parent_id' => '0']
  
      ];
  
      foreach ($data as $row) {
        Unit::create($row);
      }
    }
}
