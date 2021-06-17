<?php

namespace Database\Seeders;

use App\Models\Aanbieding;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AanbiedingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Aanbieding::create([
      'gerecht_id' => 1,
      'titel' => 'Chinese Rijsttafel (2 personen)',
      'start_datum' => Carbon::today(),
      'nieuwe_prijs' => 21.0,
      'aanpassing' => 'Maak een keuze uit 3 van onderstaande keuzegerechten: <br/> <br/> <table>
            <tr> <td>Koe Loe Yuk</td> <td></td> <td>Foe Yong Hai </td> </tr>
            <tr> <td>Tjap Tjoy</td> <td></td><td>Garnalen met Gebakken Knoflook</td> </tr>
            <tr> <td>Babi Pangang</td> <td></td><td> Kipfilet in Zwarte Bonen saus</td> </tr>
            <table><br>
            Met witte rijst. (Nasi of bami voor meerprijs mogelijk.)',
    ]);
  }
}
