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
            'type' => 'guest'
        ]);
        Page::create([
            'route' => 'main.news',
            'displayName' => 'Nieuws',
            'type' => 'guest'
        ]);
        Page::create([
            'route' => 'main.menu',
            'displayName' => 'Menu kaart',
            'type' => 'guest'
        ]);
        Page::create([
            'route' => 'main.contact',
            'displayName' => 'Contact',
            'type' => 'guest'
        ]);
        Page::create([
            'route' => 'main.cocktail',
            'displayName' => 'Cocktails',
            'type' => 'guest'
        ]);
        Page::create([
            'route' => 'afhaal.index',
            'displayName' => 'Afhalen',
            'type' => 'guest'
        ]);

    }
}
