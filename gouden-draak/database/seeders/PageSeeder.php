<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Page::create([
      'route' => 'main.index',
      'displayName' => 'Home',
      'type' => 'guest',
    ]);
    Page::create([
      'route' => 'main.news',
      'displayName' => 'Nieuws',
      'type' => 'guest',
    ]);
    Page::create([
      'route' => 'main.menu',
      'displayName' => 'Menu kaart',
      'type' => 'guest',
    ]);
    Page::create([
      'route' => 'main.cocktail',
      'displayName' => 'Cocktails',
      'type' => 'guest',
    ]);
    Page::create([
      'route' => 'afhaal.index',
      'displayName' => 'Afhalen',
      'type' => 'guest',
    ]);
    Page::create([
      'route' => 'main.contact',
      'displayName' => 'Contact',
      'type' => 'guest',
    ]);
    Page::create([
      'route' => 'cashregister.index',
      'displayName' => 'Kassa',
      'type' => 'kassa',
    ]);
    Page::create([
      'route' => 'cashregister.gerecht.index',
      'displayName' => 'Gerechten',
      'type' => 'kassa',
    ]);
    Page::create([
      'route' => 'cashregister.verkoop',
      'displayName' => 'Verkoop Overzicht',
      'type' => 'kassa',
    ]);
    Page::create([
      'route' => 'cashregister.sales',
      'displayName' => 'Dagelijkse verkoop lijst',
      'type' => 'kassa',
    ]);
    Page::create([
      'route' => 'logout',
      'displayName' => 'Uitloggen',
      'type' => 'logout',
    ]);
  }
}
