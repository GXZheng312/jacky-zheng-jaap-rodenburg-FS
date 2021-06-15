<?php

namespace App\Models;
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $gerecht_id
 * @property int $aantal
 * @property string $datum
 * @property string $soortgerecht
 * @property string $opmerking
 * @property int|null $bijgerecht
 * @property int|null $aanbieding
 * @property string $afhaaltijdstip
 * @mixin Eloquent
 * @method static create(array $array)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Order extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $fillable = ['gerecht_id', 'aantal', 'datum', 'soortgerecht', 'opmerking', 'bijgerecht', 'aanbieding', 'afhaaltijdstip'];
  public function bijgerecht()
  {
    return $this->belongsTo(Gerecht::class);
  }
  public function aanbieding()
  {
    return $this->belongsTo(Aanbieding::class);
  }
}
