<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aanbieding;
use Illuminate\Http\Request;

class AanbiedingController extends Controller
{
  public function aanbiedingHighlight(): array
  {
    $allItems = Aanbieding::first()->jsonSerialize();
    return $allItems;
  }
}
