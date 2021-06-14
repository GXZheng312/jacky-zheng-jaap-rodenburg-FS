<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Soort_Gerecht
 *
 * @property string $soort
 * @property string $soort_toevoeging
 * @mixin Eloquent
 * @method static create(string[] $array)
 */
class Soort_Gerecht extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'soort_gerecht';

  protected $fillable = ['soort', 'soort_toevoeging'];

  public function gerechten()
  {
    return $this->hasMany(Gerecht::class, 'soortgerecht_id');
  }
}
