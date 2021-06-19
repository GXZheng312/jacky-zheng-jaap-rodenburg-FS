<?php

namespace App\Http\Controllers;

use App\Http\Requests\AfhaalRequest;
use App\Models\Order;
use App\Models\Order_Bestelling;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AfhaalController extends Controller
{
    public function index()
    {
        return view('app.afhalen.index');
    }

    public function submit(AfhaalRequest $request)
    {
        $gerechten = $this->groupGerechtAmount($request);
        $order_bestellingen = [];
        $order = Order::create([
            'datum' => Carbon::now()->toDateString(),
            'afhaaltijdstip' => $request->get('afhaaltime'),
            'naam' => $request->get('name'),
        ]);
        foreach ($gerechten as $gerecht) {
            $order_bestelling = Order_Bestelling::create([
                'order_id' => $order->id,
                'gerecht_id' => $gerecht['gerecht'],
                'aantal' => $gerecht['amount'],
                'opmerking' => $gerecht['note']
            ]);
            array_push($order_bestellingen, $order_bestelling);
        }
        return redirect(route('order.show', $order->id));
    }

    public function show($id)
    {
        return view('app.afhalen.orderconfirm')->with('id', $id);
    }

    function groupGerechtAmount($request)
    {
        $gerechtenData = $request->get('gerecht');
        $amountData = $request->get('amount');
        $noteData = $request->get('note');
        $result = [];
        for ($i = 0; $i < count($gerechtenData); $i++) {
            $object = ['gerecht' => $gerechtenData[$i], 'amount' => $amountData[$i], 'note' => $noteData[$i]];
            array_push($result, $object);
        }
        return $result;
    }
}
