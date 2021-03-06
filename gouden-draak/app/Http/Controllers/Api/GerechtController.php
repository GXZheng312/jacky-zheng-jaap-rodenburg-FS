<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gerecht;
use App\Models\Soort_Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
  public function gerechten()
  {
    return Gerecht::with('allergenes')
      ->with('pittigheid')
      ->with('soort_gerecht')
      ->orderBy('menunummer')
      ->orderBy('menu_toevoeging')
      ->get()
      ->jsonSerialize();
  }

  public function soortGerechten(): array
  {
    return Soort_Gerecht::with('gerechten', 'gerechten.pittigheid', 'gerechten.allergenes')
      ->get()
      ->jsonSerialize();
  }

  public function bijgerechten(): array
  {
    $bijgerecht = Soort_Gerecht::where('soort', 'BIJGERECHT')->first();

    return Gerecht::where('soortgerecht_id', $bijgerecht->id)
      ->get()
      ->jsonSerialize();
  }
}
