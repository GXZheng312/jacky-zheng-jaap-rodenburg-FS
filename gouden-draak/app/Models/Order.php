<?php

namespace App\Models;
/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $datum
 * @property string $opmerking
 * @property string $afhaaltijdstip
 * @property string $naam
 * @mixin Eloquent
 */

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * @method static create(array $array)
 */
class Order extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $fillable = ['datum','afhaaltijdstip', 'naam'];

  public function __construct() 
  {
      $this->attributes['datum'] = Carbon::now()->toDateString();
  }

  public function orders()
  {
    return $this->hasMany(Order_Bestelling::class);
  }

  public function getQRCode(){
      $order_bestellingen = $this->orders()->get();
      return QrCode::size(300)->errorCorrection('H')->generate(json_encode(['order_bestellingen' => $order_bestellingen, 'order' => $this]));
  }
}
