<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Pittigheid
 *
 * @property string $pittigheid
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Pittigheid extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'pittigheids';

  protected $fillable = ['pittigheid'];

  public function gerecht()
  {
    return $this->belongsTo(Gerecht::class);
  }
}
