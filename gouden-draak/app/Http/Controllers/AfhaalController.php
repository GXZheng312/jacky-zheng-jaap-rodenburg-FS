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
        $orders = [];
        foreach($gerechten as $gerecht){
            $order = Order::create([
                'gerecht_id' => $gerecht['gerecht'],
                'aantal' =>  $gerecht['amount'],
                'datum' => Carbon::now()->toDateString(),
                'afhaaltijdstip' => Carbon::now()->addHour()->toDateString()
            ]);
            array_push($orders, $order);
        }
        return QrCode::size(300)->generate(json_encode($orders));
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
