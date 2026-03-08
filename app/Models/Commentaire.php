<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\User;
use App\Models\Statut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $comment
 * @property string|null $kilometrage
 * @property int $active
 * @property int $vhl_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property int|null $statut_id
 * @property int|null $parent_id
 * @property-read Commentaire|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Commentaire> $replies
 * @property-read int|null $replies_count
 * @property-read Statut|null $statut
 * @property-read User|null $user
 * @property-read Vhl $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereKilometrage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereStatutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereVhlId($value)
 * @mixin \Eloquent
 */
class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'vhl_id',
        'active',
        'user_id',
        'kilometrage',
        'statut_id',
        'parent_id',
    ];

    protected $with = [
        'user',
        'statut',
        'replies',
        'vhl',
    ];

    public function vhl()
    {

        return $this->belongsTo(Vhl::class);
    }

    public function replies()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('updated_at', 'desc')->with('replies');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }
}
