<?php

namespace App\Models;

use App\Models\Vhl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $nom
 * @property int $location
 * @property string $ville
 * @property string $adresse
 * @property string $tel
 * @property string $mail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $acronym
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereAcronym($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereVille($value)
 * @mixin \Eloquent
 */
class Intitule extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'location', 'ville', 'tel'];

    protected $hidden = ['created_at', 'updated_at'];

    public function vhls()
    {
        return $this->hasMany(Vhl::class);
    }
}
