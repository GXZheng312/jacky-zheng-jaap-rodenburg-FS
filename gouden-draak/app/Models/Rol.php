<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Rol
 *
 * @property string $rol
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Rol extends Model
{
    use HasFactory;
    public $timestamps = false; // removes the 'created_at' & 'updated_at' properties
    protected $table = 'rol';

    protected $fillable = ['rol'];
}
