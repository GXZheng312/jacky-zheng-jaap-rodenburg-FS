<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Allergene
 *
 * @property int $id
 * @property string $naam
 * @property string $beschrijving
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Allergene extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $fillable = ['naam', 'beschrinving'];
}