<?php

namespace Database\Seeders;

use App\Models\gerecht_allergenes;
use Illuminate\Database\Seeder;

class GerechtAllergeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        gerecht_allergenes::create([
            "id_gerecht" => 1,
            "id_allergenes" => 1
        ]);
        gerecht_allergenes::create([
            "id_gerecht" => 1,
            "id_allergenes" => 2
        ]);
        gerecht_allergenes::create([
            "id_gerecht" => 3,
            "id_allergenes" => 3
        ]);
    }
}
