<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\gerecht_allergenes
 *
 * @property int $id_gerecht
 * @property int $id_allergenes
 * @mixin Eloquent
 */
class gerecht_allergenes extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $fillable = ['id_gerecht', 'id_allergenes'];

  public function allergene()
  {
    return $this->belongsTo(Allergene::class);
  }
  public function gerecht()
  {
    return $this->belongsTo(Gerecht::class);
  }
}
