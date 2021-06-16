<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gerecht;
use App\Models\Order;
use App\Models\Soort_Gerecht;
use Illuminate\Http\Request;

class AfhaalController extends Controller
{
    public function orderDetails($orderId): array
    {
        return Order::with('orders')->with('orders.gerecht')->with('orders.aanbieding')->where('id', $orderId)->get()->first()->jsonSerialize();
    }
    public function qrCode($orderId)
    {
        return Order::where('id', $orderId)->first()->getQRCode();
    }

}
