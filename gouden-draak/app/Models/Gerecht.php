<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Gerecht
 *
 * @property int $id
 * @property int $menu_toevoeging
 * @property float $prijs
 * @property string $soortgerecht
 * @property string $beschrijving
 * @property string pittigheid
 * @mixin Eloquent
 */
class Gerecht extends Model
{
  use HasFactory;

  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties

  protected $fillable = ['menu_toevoeging', 'prijs', 'soortgerecht', 'beschrijving', 'pittigheid'];
}
