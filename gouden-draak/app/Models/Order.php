<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $datum
 * @property string $afhaaltijdstip
 * @property string $naam
 * @mixin Eloquent
 */

class Order extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $fillable = ['datum','afhaaltijdstip', 'naam'];

  public function orders()
  {
    return $this->hasMany(Order_Bestelling::class);
  }

  public function getQRCode(){
      $order_bestellingen = $this->orders()->get();
      return QrCode::size(300)->errorCorrection('H')->generate(json_encode(['order_bestellingen' => $order_bestellingen, 'order' => $this]));
  }
}
