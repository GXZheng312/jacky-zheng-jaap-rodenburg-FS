<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Menu
 *
 * @property string $datum
 * @property string $pdf_pad
 * @property boolean $actief
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Menu extends Model
{
    use HasFactory;
    public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
    protected $fillable = ['datum', 'pdf_pad', 'actief'];
}
