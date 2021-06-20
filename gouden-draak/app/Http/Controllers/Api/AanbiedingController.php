<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aanbieding;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AanbiedingController extends Controller
{
  public function aanbiedingHighlight(): array
  {
    $allItems = Aanbieding::first()->jsonSerialize();
    return $allItems;
  }

  public function aanbiedingenOfWeek(): array
  {
    $now = Carbon::now();
    $weekStartDate = $now->startOfWeek();
    $weekEndDate = $now->endOfWeek();

    return Aanbieding::where('start_datum', '<=', $weekStartDate)
      ->where('eind_datum', '>=', $weekEndDate)
      ->orWhere('eind_datum', null)
      ->get()
      ->jsonSerialize();
  }
}
