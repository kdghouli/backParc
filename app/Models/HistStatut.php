<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\User;
use App\Models\Statut;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $vhl_id
 * @property int|null $ancien_statut_id
 * @property int $nouveau_statut_id
 * @property int $user_id
 * @property string|null $commentaire
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Statut|null $ancienStatut
 * @property-read Statut $nouveauStatut
 * @property-read User $user
 * @property-read Vhl $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereAncienStatutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereCommentaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereNouveauStatutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereVhlId($value)
 * @mixin \Eloquent
 */
class HistStatut extends Model
{
  use HasFactory;

    protected $table = 'hist_statuts'; // Uncomment and set the table name if needed
    protected $fillable = [
        'vhl_id',
        'ancien_statut_id',
        'nouveau_statut_id',
        'user_id',
        'commentaire',
        'created_at',
        'updated_at'
    ];

    public function vhl()
    {
        return $this->belongsTo(Vhl::class);
    }

    public function ancienStatut()
    {
        return $this->belongsTo(Statut::class, 'ancien_statut_id');
    }

    public function nouveauStatut()
    {
        return $this->belongsTo(Statut::class, 'nouveau_statut_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
