<?php

namespace App\Http\Controllers;

use App\Http\Requests\AfhaalRequest;
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

        $result = ['gerechten' =>  $gerechten];
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
