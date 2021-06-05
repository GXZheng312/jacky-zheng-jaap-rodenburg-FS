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
    Gerecht::create([
      'menunummer' => 2,
      'naam' => 'Tomatensoep',
      'prijs' => 11.99,
      'soortgerecht' => 'Voorgerecht',
      'beschrijving' => 'Lekker zoete soep gemaakt van verse tomaten',
      'pittigheid' => 'Niet pittig',
    ]);
    Gerecht::create([
      'menunummer' => 3,
      'naam' => 'Sushi met Hete Peper',
      'prijs' => 5.5,
      'soortgerecht' => 'Hoofdgerecht',
      'beschrijving' => 'Pittige sushi met zalm een veel peper',
      'pittigheid' => 'Pittig',
    ]);
    Gerecht::create([
      'menunummer' => 3,
      'menu_toevoeging' => 'A',
      'naam' => 'Sushi met ketjap manis, Zalm en wortel',
      'prijs' => 6.75,
      'soortgerecht' => 'Hoofdgerecht',
      'beschrijving' =>
        'Lekker zoete sushi, met een vleugje ketjap manis, van het huis. Rauwe zalm en een kleine wortel. Afgemaakt met de heetste peper die er maar is.',
      'pittigheid' => 'Zeer pittig',
    ]);
  }
}
