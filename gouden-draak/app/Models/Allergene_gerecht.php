<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Allergene_gerecht
 *
 * @property int $gerecht_id
 * @property int $allergenes_id
 * @mixin Eloquent
 */
class Allergene_gerecht extends Model
{
  protected $table = 'allergene_gerecht';
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $fillable = ['gerecht_id', 'allergenes_id'];

  public function allergenes()
  {
    return $this->belongsTo(Allergenes::class);
  }
  public function gerecht()
  {
    return $this->belongsTo(Gerecht::class);
  }
}
