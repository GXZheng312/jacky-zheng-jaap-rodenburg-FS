<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BestellingRequest;
use App\Models\Gerecht;
use App\Models\Order;
use App\Models\Order_Bestelling;

class BestellingController extends Controller
{
	public function store(BestellingRequest $request)
	{
		$request->validated();
		$order = Order::create();

		foreach($request->input('gerechten') as $gerechtItem){
			$bestellingRegel = Order_Bestelling::create([
				'order_id' => $order->id,
				'gerecht_id' => $gerechtItem['id'],
				'aantal' => $gerechtItem['aantal']
			]);
			
			if(is_int($gerechtItem['bijgerecht']) && gerecht::find($gerechtItem['bijgerecht'])?->soort_gerecht->soort != 'BIJGERECHT'){
				$bestellingRegel->bijgerecht = $gerechtItem['bijgerecht'];
			}
			
			if($gerechtItem['opmerking'] != null){
				$bestellingRegel->opmerking = $gerechtItem['opmerking'];
			}

			$bestellingRegel->save();
		}

		return $request->input('gerechten');	
	}
}
