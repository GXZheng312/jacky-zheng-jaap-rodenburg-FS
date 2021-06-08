<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Gerecht
 *
 * @property int $id
 * @property int $menunummer
 * @property int|null $menu_toevoeging
 * @property float $prijs
 * @property string $soortgerecht
 * @property string $beschrijving
 * @property string pittigheid
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Gerecht extends Model
{
  use HasFactory;

  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'gerecht';

  protected $fillable = ['menunummer', 'menu_toevoeging', 'prijs', 'soortgerecht', 'beschrijving', 'pittigheid'];

  public function soortGerecht()
  {
    return $this->belongsTo(Soort_Gerecht::class);
  }
  public function pittigheid()
  {
    return $this->belongsTo(Pittigheid::class);
  }
  public function allergenes()
  {
    return $this->belongsToMany(Allergene::class);
  }
}
