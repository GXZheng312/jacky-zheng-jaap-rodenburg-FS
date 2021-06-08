<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Medewerker
 *
 * @property int $id
 * @property string $voornaam
 * @property string $achternaam
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Medewerker extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $fillable = ['voornaam', 'achternaam'];
}
