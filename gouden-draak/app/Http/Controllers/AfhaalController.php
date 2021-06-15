<?php

namespace App\Http\Controllers;

use App\Http\Requests\AfhaalRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AfhaalController extends Controller
{
    public function index()
    {
        return view('app.cashier.index');
    }

    public function submit(AfhaalRequest $request)
    {
        $gerechten = $this->groupGerechtAmount($request);
        $orderId = [];
        foreach($gerechten as $gerecht){
            $id = Order::create([
                'gerecht_id' => $gerecht['gerecht'],
                'aantal' =>  $gerecht['amount'],
                'datum' => Carbon::now()->toDateString(),
                'afhaaltijdstip' => Carbon::now()->addHour()->toDateString()
            ]);
            array_push($orderId, $id);
        }
        $result = ['gerechten' =>  $gerechten, 'orderid' => $orderId];
        return QrCode::size(300)->generate(json_encode($result));
    }

    function groupGerechtAmount($request)
    {
        $gerechtenData = $request->get('gerecht');
        $amountData = $request->get('amount');
        $result = [];
        for ($i = 0; $i < count($gerechtenData); $i++) {
            $object = ['gerecht'=> $gerechtenData[$i], 'amount' => $amountData[$i]];
            array_push($result, $object);
        }
        return $result;
    }
}
