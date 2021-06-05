<?php

namespace Database\Seeders;

use App\Models\Soort_Gerecht;
use Illuminate\Database\Seeder;

class SoortGerechtSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Soort_Gerecht::create([
      'soort' => 'Voorgerecht',
    ]);
    Soort_Gerecht::create([
      'soort' => 'Hoofdgerecht',
    ]);
  }
}
