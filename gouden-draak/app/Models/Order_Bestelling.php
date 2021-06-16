<?php

namespace App\Models;
/**
 * App\Models\Order_Bestelling
 *
 * @property int $order_id
 * @property int $gerecht_id
 * @property int $aantal
 * @property int $aanbieding
 * @property string $opmerking
 * @mixin Eloquent
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Bestelling extends Model
{
    use HasFactory;
    public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
    protected $table = 'order_bestelling';

    protected $fillable = ['order_id', 'gerecht_id', 'aantal', 'aanbieding', 'opmerking'];

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
}
