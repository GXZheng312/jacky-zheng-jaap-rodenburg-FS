<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\TafelBestelling
 *
 * @property int $id_tafelbezetting
 * @property string $datum
 * @property int $gerecht
 * @mixin Eloquent
 * @method static create(array $array)
 */
class TafelBestelling extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'tafel_bestelling';

  protected $fillable = ['id_tafelbezetting', 'datum', 'gerecht'];

  public function tafelbezetting()
  {
    return $this->belongsTo(TafelBezetting::class);
  }
  public function gerecht()
  {
    return $this->belongsTo(Gerecht::class);
  }
}
