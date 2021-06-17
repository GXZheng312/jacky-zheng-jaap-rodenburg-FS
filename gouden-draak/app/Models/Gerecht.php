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
 * @property int $soortgerecht_id
 * @property string $beschrijving
 * @property int $pittigheid_id
 * @mixin Eloquent
 */
class Gerecht extends Model
{
  use HasFactory;

  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'gerecht';

  protected $fillable = ['menunummer', 'menu_toevoeging', 'prijs', 'soortgerecht_id', 'beschrijving', 'pittigheid_id'];

  public function soort_gerecht()
  {
    return $this->belongsTo(Soort_Gerecht::class, 'soortgerecht_id', 'id');
  }
  public function pittigheid()
  {
    return $this->belongsTo(Pittigheid::class);
  }
  public function allergenes()
  {
    return $this->belongsToMany(Allergenes::class, 'allergene_gerecht', 'gerecht_id', 'allergenes_id');
  }
}
