<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BestellingRequest;
use App\Models\Gerecht;
use App\Models\Order;

class BestellingController extends Controller
{
	public function store(BestellingRequest $request)
	{
		$request->validated();

		$order = Order::create([	
            'opmerking' => $request->get('notes'),
            'naam' => $request->get('name')
        ]);
		


		return $request->input('gerechten');	
	}
}
