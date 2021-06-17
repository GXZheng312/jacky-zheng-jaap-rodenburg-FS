<?php

namespace Database\Seeders;

use App\Models\Allergenes;
use Illuminate\Database\Seeder;

class AllergeneSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Allergenes::create([
      'naam' => 'gluten',
      'beschrijving' =>
        'Gluten is het woord voor eiwitten die voorkomen in sómmige granen: tarwe, rogge, gerst (gort), spelt en khorasan tarwe.',
    ]);
    Allergenes::create([
      'naam' => 'lactose',
      'beschrijving' =>
        'Lactose, ook wel melksuiker genoemd, is een suiker die voorkomt in de melk van alle zoogdieren, koemelk bevat 4 tot 5 procent lactose.',
    ]);
    Allergenes::create([
      'naam' => 'varkensvlees',
      'beschrijving' =>
        'Varkensvlees is één van de meest gegeten vleessoorten in Nederland en Europa. Bekende producten zijn ham, worst, spek en karbonade.',
    ]);
  }
}
