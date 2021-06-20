<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class DailySalesController extends Controller
{
  public function dailySales()
  {
    return $this->generateObjects();
  }
  private function generateObjects()
  {
    $files = glob('sales/*');
    $result = [];
    foreach ($files as $file) {
      $date = explode('sales/sales-', $file)[1];
      $date = explode('.xlsx', $date)[0];
      $object = ['download' => '/' . $file, 'date' => $date];
      array_push($result, $object);
    }
    return $result;
  }
}
