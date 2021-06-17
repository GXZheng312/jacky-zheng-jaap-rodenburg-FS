<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order_Bestelling
 *
 * @property int $order_bestelling_id
 * @property int $bijgerecht_id
 * @property int $aantal
 * @mixin Eloquent
 */

class Bijgerecht_bestelling extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'bijgerecht_bestelling';
  protected $primaryKey = ['order_bestelling_id', 'bijgerecht_id'];
  public $incrementing = false;

  protected $fillable = ['order_bestelling_id', 'bijgerecht_id', 'aantal'];

  public function Order_Bestelling()
  {
    return $this->belongsTo(Order_Bestelling::class);
  }

  public function bijgerecht()
  {
    return $this->belongsTo(Gerecht::class);
  }
}
