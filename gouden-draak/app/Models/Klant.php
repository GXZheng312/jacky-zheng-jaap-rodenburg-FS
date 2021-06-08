<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Klant
 *
 * @property int $id
 * @property string $voornaam
 * @property string $achternaam
 * @property string $telefoonnummer
 * @property string $email
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Klant extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
  protected $table = 'klant';

  protected $fillable = ['voornaam', 'achternaam', 'telefoonnummer', 'email'];
}
