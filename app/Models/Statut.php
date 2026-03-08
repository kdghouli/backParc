<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Commentaire> $commentaires
 * @property-read int|null $commentaires_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Statut extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function vhls()
    {
        return $this->hasMany(Vhl::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }


}
