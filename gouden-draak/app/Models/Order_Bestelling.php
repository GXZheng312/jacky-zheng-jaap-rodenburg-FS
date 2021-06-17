<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order_Bestelling
 *
 * @property int $order_id
 * @property int $gerecht_id
 * @property int $aantal
 * @property int $aanbieding_id
 * @property string $opmerking
 * @mixin Eloquent
 */

class Order_Bestelling extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'order_bestelling';

  protected $fillable = ['order_id', 'gerecht_id', 'aantal', 'aanbieding_id', 'opmerking'];

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
  public function gerecht()
  {
    return $this->belongsTo(Gerecht::class);
  }
  public function aanbieding()
  {
    return $this->belongsTo(Aanbieding::class);
  }
  public function bijgerecht()
  {
    return $this->hasMany(Bijgerecht_bestelling::class);
  }
}
