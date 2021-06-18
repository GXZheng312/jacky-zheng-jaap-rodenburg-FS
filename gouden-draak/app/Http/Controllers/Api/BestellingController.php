<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BestellingRequest;
use App\Models\Bijgerecht_bestelling;
use App\Models\Gerecht;
use App\Models\Order;
use App\Models\Order_Bestelling;
use Illuminate\Http\Request;

class BestellingController extends Controller
{
  public function byDates(Request $request)
  {
    $startDatum = $request->input('startDatum');
    $eindDatum = $request->input('eindDatum');

    return Order::whereBetween('datum', [$startDatum, $eindDatum])
      ->with('orders', 'orders.gerecht')
      ->orderBy('datum', 'DESC')
      ->get()
      ->jsonSerialize();
  }

  public function store(BestellingRequest $request)
  {
    $request->validated();
    $order = Order::create();

    foreach ($request->input('gerechten') as $gerechtItem) {
      $bestellingRegel = Order_Bestelling::create([
        'order_id' => $order->id,
        'gerecht_id' => $gerechtItem['id'],
        'aantal' => $gerechtItem['aantal'],
      ]);

      $this->addBijgerechten($order, $gerechtItem['bijgerechten']);

      $this->addOpmerking($bestellingRegel, $gerechtItem['opmerking']);

      $bestellingRegel->save();
    }

    return $request->input('gerechten');
  }

  private function addBijgerechten($order, $bijgerechten)
  {
    foreach ($bijgerechten as $bijgerecht) {
      if (is_int($bijgerecht['id']) && gerecht::find($bijgerecht['id'])->soort != 'bijgerecht') {
        Bijgerecht_bestelling::create([
          'order_bestelling_id' => $order->id,
          'bijgerecht_id' => $bijgerecht['id'],
          'aantal' => $bijgerecht['aantal'],
        ]);
      }
    }
  }

  private function addOpmerking($bestellingRegel, $opmerking)
  {
    if ($opmerking != null) {
      $bestellingRegel->opmerking = $opmerking;
    }
  }
}
