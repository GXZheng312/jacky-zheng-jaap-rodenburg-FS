<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gerecht;
use App\Models\Soort_Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
  public function gerechten(): array
  {
    $allItems = Gerecht::with('allergenes')->with('pittigheid')->with('soort_gerecht')->get()->jsonSerialize();
    return $allItems;
  }


  public function soortGerechten(): array
  {
    $allItems = Soort_Gerecht::with('gerechten', 'gerechten.pittigheid', 'gerechten.allergenes')->get()->jsonSerialize();
    return $allItems;
  }
}
