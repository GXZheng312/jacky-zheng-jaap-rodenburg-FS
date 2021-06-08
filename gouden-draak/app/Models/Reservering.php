<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Reservering
 *
 * @property int $id
 * @property int $id_klant
 * @property string $datum
 * @property int $aantal_personen
 * @property string|null $opmerking
 * @property boolean $bevestiging_verstuurd
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Reservering extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'reservering';

  protected $fillable = ['id_klant', 'datum', 'aantal_personen', 'opmerking', 'bevestiging_verstuurd'];

  public function klant()
  {
    return $this->belongsTo(Klant::class);
  }
}
