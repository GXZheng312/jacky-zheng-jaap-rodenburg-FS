<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
  public function index(): array
  {
    $allItems = Gerecht::with('allergenes')->with('pittigheid')->with('soort_gerecht')->get()->jsonSerialize();
    return $allItems;
  }
}
