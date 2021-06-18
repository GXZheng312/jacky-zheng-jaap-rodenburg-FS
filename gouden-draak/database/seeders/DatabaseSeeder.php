<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(PittigheidSeeder::class);
    $this->call(GerechtSeeder::class);
    $this->call(AllergeneSeeder::class);
    $this->call(AllergeneGerechtSeeder::class);
    $this->call(AanbiedingSeeder::class);
    $this->call(UserSeeder::class);
      $this->call(PageSeeder::class);
  }
}
