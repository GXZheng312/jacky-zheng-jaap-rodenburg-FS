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
        Page::make([
            'route' => 'index',
            'displayName' => 'Home',
            'type' => 'guest'
        ]);
        Page::make([
            'route' => 'news',
            'displayName' => 'Nieuws',
            'type' => 'guest'
        ]);
        Page::make([
            'route' => 'menu',
            'displayName' => 'Menu kaart',
            'type' => 'guest'
        ]);
        Page::make([
            'route' => 'contact',
            'displayName' => 'Contact',
            'type' => 'guest'
        ]);
        Page::make([
            'route' => 'cocktail',
            'displayName' => 'Cocktails',
            'type' => 'guest'
        ]);
        Page::make([
            'route' => 'afhaal.index',
            'displayName' => 'Afhalen',
            'type' => 'guest'
        ]);

    }
}
