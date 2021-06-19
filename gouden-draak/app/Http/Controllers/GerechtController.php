<?php

namespace App\Http\Controllers;

use App\Http\Requests\GerechtRequest;
use App\Models\Allergenes;
use App\Models\Gerecht;
use App\Models\Pittigheid;
use App\Models\Soort_Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('app.cashier.gerecht.index', [
      'gerechten' => Gerecht::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('app.cashier.gerecht.createOrEdit', [
      'pittigheids' => Pittigheid::all()->pluck('pittigheid', 'id'),
      'soortgerechten' => Soort_Gerecht::all()->pluck('soort', 'id'),
      'allergenes' => Allergenes::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(GerechtRequest $request)
  {
    $this->updateOrSaveGerecht(new Gerecht(), $request);

    return redirect()->route('cashregister.gerecht.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    return view('app.cashier.gerecht.show', [
      'gerecht' => Gerecht::findOrFail($id),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    return view('app.cashier.gerecht.createOrEdit', [
      'gerecht' => Gerecht::findOrFail($id),
      'pittigheids' => Pittigheid::all()->pluck('pittigheid', 'id'),
      'soortgerechten' => Soort_Gerecht::all()->pluck('soort', 'id'),
      'allergenes' => Allergenes::all(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, GerechtRequest $request)
  {
    $this->updateOrSaveGerecht(Gerecht::findOrFail($id), $request, true);

    return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Gerecht::findOrFail($id)->delete();

    return redirect()->route('cashregister.gerecht.index');
  }

  private function updateOrSaveGerecht(Gerecht $gerecht, GerechtRequest $request, $update = false)
  {
    $request->validated();

    $gerecht->menunummer = $request->input('menunummer') ? $request->input('menunummer') : Gerecht::max('menunummer');

    if ($request->input('menu_toevoeging')) {
      $gerecht->menu_toevoeging = $request->input('menu_toevoeging');
    } else {
      $gerecht->menunummer = $request->input('menunummer') ? $request->input('menunummer') : Gerecht::max('menunummer') + 1;
    }

    $gerecht->naam = $request->input('naam');
    $gerecht->prijs = $request->input('prijs');
    $gerecht->soortgerecht_id = $request->input('soortgerecht_id');

    if ($request->input('beschrijving')) {
      $gerecht->beschrijving = $request->input('beschrijving');
    }

    $gerecht->pittigheid_id = $request->input('pittigheid_id');

    if (!$update) {
      $gerecht->save();
    }
    if ($update) {
      $gerecht->update();
    }

    $gerecht->allergenes()->sync($request->input('Allergenes'));
  }
}
