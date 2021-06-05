<?php

namespace Database\Seeders;

use App\Models\Gerecht;
use Illuminate\Database\Seeder;

class GerechtSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Gerecht::create([
      'menunummer' => 1,
      'naam' => 'Ketjap Manis',
      'prijs' => 9.95,
      'soortgerecht' => 'Voorgerecht',
      'beschrijving' => 'Lekker zoete soep',
      'pittigheid' => 'Niet pittig',
    ]);
  }
}
