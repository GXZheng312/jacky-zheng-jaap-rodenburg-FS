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
            'opmerking' => $request->get('notes')
        ]);
        foreach ($gerechten as $gerecht) {
            $order_bestelling = Order_Bestelling::create([
                'order_id' => $order->id,
                'gerecht_id' => $gerecht['gerecht'],
                'aantal' => $gerecht['amount']
            ]);
            array_push($order_bestellingen, $order_bestelling);
        }
        $qrcode = QrCode::size(300)->errorCorrection('H')->generate(json_encode(['order_bestellingen' => $order_bestellingen, 'order' => $order, 'name' => $request->get('name')]));
        return view('app.afhalen.orderconfirm')->with('qrCode', $qrcode);
    }

    function groupGerechtAmount($request)
    {
        $gerechtenData = $request->get('gerecht');
        $amountData = $request->get('amount');
        $result = [];
        for ($i = 0; $i < count($gerechtenData); $i++) {
            $object = ['gerecht' => $gerechtenData[$i], 'amount' => $amountData[$i]];
            array_push($result, $object);
        }
        return $result;
    }
}
