<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Page
 *
 * @property string $route
 * @property string $displayName
 * @property string $type
 * @mixin Eloquent
 * @method static create(array $array)
 * @method static make(array $array)
 * @method static where(string $string, $type)
 */
class Page extends Model
{
  use HasFactory;
  public $timestamps = false; // removes the 'created_at' & 'updated_at' properties

  protected $fillable = ['route', 'displayName', 'type'];
}
