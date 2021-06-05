<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
  public function index(): array
  {
    $allItems = Gerecht::all()->jsonSerialize();
    return $allItems;
  }
}
