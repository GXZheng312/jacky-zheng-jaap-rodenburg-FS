<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Gebruiker
 *
 * @property int $id
 * @property string $gebruikersnama
 * @property string $wachtwoord
 * @property string|null $rol
 * @property int|null $id_medewerker
 * @mixin Eloquent
 * @method static create(array $array)
 */
class Gebruiker extends Model
{
    use HasFactory;
    public $timestamps = false; // removes the 'created_at' & 'updated_at' properties

    protected $fillable = ['gebruikersnaam', 'wachtwoord', 'rol', 'id_medewerker'];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
}
