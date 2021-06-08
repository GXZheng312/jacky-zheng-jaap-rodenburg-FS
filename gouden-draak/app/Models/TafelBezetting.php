<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\TafelBezetting
 *
 * @property int $id
 * @property string $tafelpassword
 * @property int $tafelnummer
 * @property int $klant
 * @property string $start_datum
 * @property string $assistentie_gevraagd
 * @property int $medewerker_dienst
 * @mixin Eloquent
 * @method static create(array $array)
 */
class TafelBezetting extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'tafel_bezetting';

  protected $fillable = ['tafelpassword', 'tafelnummer', 'klant', 'start_datum', 'assistentie_gevraagd', 'medewerker_dienst'];

  public function medewerker_dienst()
  {
    return $this->belongsTo(Medewerker::class);
  }
  public function klant()
  {
    return $this->belongsTo(Klant::class);
  }
}
