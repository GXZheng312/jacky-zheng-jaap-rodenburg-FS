<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Aanbieding
 *
 * @property int $id
 * @property int $id_gerecht
 * @property string $titel
 * @property string $start_datum
 * @property string|null $eind_datum
 * @property float $nieuwe_prijs
 * @property string $aanpassing
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Aanbieding extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'aanbieding';
  protected $fillable = ['gerecht_id', 'titel', 'start_datum', 'eind_datum', 'nieuwe_prijs', 'aanpassing'];

  public function gerecht()
  {
    return $this->belongsTo(Gerecht::class);
  }
}
