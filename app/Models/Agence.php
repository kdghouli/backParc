<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $nom
 * @property string $site
 * @property string $division
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Utilisateur> $utilisateurs
 * @property-read int|null $utilisateurs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'division',
        'site',
    ];

    protected $hidden = ['created_at', 'updated_at'];



    public function vhls()
    {
        return $this->hasMany(Vhl::class);
    }

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }
}
