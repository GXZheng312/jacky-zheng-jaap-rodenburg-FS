<?php

namespace Database\Seeders;

use App\Models\Allergene_gerecht;
use Illuminate\Database\Seeder;

class AllergeneGerechtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Allergene_gerecht::create([
            'gerecht_id' => 1,
            'allergenes_id' => 1,
        ]);
        Allergene_gerecht::create([
            'gerecht_id' => 1,
            'allergenes_id' => 2,
        ]);
        Allergene_gerecht::create([
            'gerecht_id' => 1,
            'allergenes_id' => 3,
        ]);
        Allergene_gerecht::create([
            'gerecht_id' => 2,
            'allergenes_id' => 2,
        ]);
        Allergene_gerecht::create([
            'gerecht_id' => 3,
            'allergenes_id' => 3,
        ]);
    }
}
