<?php

namespace Database\Seeders;

use App\Models\Gerecht;
use App\Models\Soort_Gerecht;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GerechtSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$json = File::get("database/data/gerechten.json");
		$gerechten = json_decode($json);
		$addExtra = 0;
		$previouslyIncremented = false;

		foreach($gerechten as $gerecht){
			$soortgerecht = Soort_Gerecht::where('soort', $gerecht[5])->first();

			if(!$soortgerecht) {
				$soortgerecht = Soort_Gerecht::create(['soort' => $gerecht[5]]);
			}

			// if(!$gerecht[1]) {
			// 	if(!$previouslyIncremented) {
			// 		$previouslyIncremented = true;
			// 		$addExtra++;
			// 	}
			// 	$gerecht[1] = Gerecht::max('menunummer') + $addExtra;
			// } 

			// if($gerecht[1]) {
			// 	$gerecht[1] += $addExtra;
			// 	$previouslyIncremented = false;
			// }

			Gerecht::create([
				'menunummer' => $gerecht[1],
				'menu_toevoeging' => $gerecht[2],
				'naam' => $gerecht[3],
				'prijs' => $gerecht[4],
				'soortgerecht_id' => $soortgerecht->id,
				'beschrijving' => $gerecht[6]
			]);

			$this->bijgerechtList();
		}
	}

	private function bijgerechtList(){
		$soortGerecht = Soort_Gerecht::create(['soort' => 'BIJGERECHT']);

		Gerecht::create([
			'naam' => 'witte rijst',
			'prijs' => 1.00,
			'soortgerecht_id' => $soortGerecht->id
		]);

		Gerecht::create([
			'naam' => 'nasi goreng',
			'prijs' => 1.00,
			'soortgerecht_id' => $soortGerecht->id
		]);

		Gerecht::create([
			'naam' => 'bami goreng',
			'prijs' => 1.00,
			'soortgerecht_id' => $soortGerecht->id
		]);

		Gerecht::create([
			'naam' => 'mihoen goreng',
			'prijs' => 1.00,
			'soortgerecht_id' => $soortGerecht->id
		]);

		Gerecht::create([
			'naam' => 'chinese bami',
			'prijs' => 1.00,
			'soortgerecht_id' => $soortGerecht->id
		]);
	}
}
