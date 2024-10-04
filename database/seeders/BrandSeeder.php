<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{

  public function run(): void
  {
  // видалення усіх записів з БД
    // Brand::truncate();
    // Brand::factory(20)->create();

    $data = [
      ['name' => 'Brother'],
      ['name' => 'Canon'],
      ['name' => 'HP'],
      ['name' => 'Konica Minolta'],
      ['name' => 'IZZI Print (IP)'],
      ['name' => 'Kyocera'],
      ['name' => 'Panasonic'],
      ['name' => 'Gravitone FAT410A7 Panasonic KX-FAT410A7 (KX-FAT410)'],
      ['name' => 'BASF'],
      ['name' => 'Free Labe (FL)'],
      ['name' => 'Green Label Patron (PN)'],
      ['name' => 'Toner Cartridge (CF)'],
      ['name' => 'NewTone (PN)'],
      ['name' => 'WWM'],
      ['name' => 'OKI'],
      ['name' => 'Xerox']
    ];

    foreach ($data as $row) {
      Brand::create($row);
    }

  }
}
