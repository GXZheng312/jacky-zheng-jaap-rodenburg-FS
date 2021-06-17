<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aanbieding;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
  public function cocktails()
  {
    $client = new Client();

    try {
      $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/search.php?f=' . chr(rand(97, 122)));
      $statusCode = $response->getStatusCode();
      $body = $response->getBody()->getContents();
      return $body;
    } catch (GuzzleException $e) {
    }
    return '{drinks: []}';
  }

  public function cocktailSearch($name)
  {
    $client = new Client();

    try {
      $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $name);
      $statusCode = $response->getStatusCode();
      $body = $response->getBody()->getContents();
      return $body;
    } catch (GuzzleException $e) {
    }
    return '{drinks: []}';
  }
}
