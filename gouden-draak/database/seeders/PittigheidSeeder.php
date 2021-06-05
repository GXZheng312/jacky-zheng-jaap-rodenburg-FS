<?php

namespace Database\Seeders;

use App\Models\Pittigheid;
use Illuminate\Database\Seeder;

class PittigheidSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Pittigheid::create([
      'pittigheid' => 'Niet pittig',
    ]);
    Pittigheid::create([
      'pittigheid' => 'Pittig',
    ]);
    Pittigheid::create([
      'pittigheid' => 'Zeer pittig',
    ]);
  }
}
