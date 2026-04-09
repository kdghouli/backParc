<?php

namespace App\Models;


use App\Models\Vhl;
use App\Models\User;
use App\Models\Kilometrage;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string|null $dateControle
 * @property int $frein
 * @property int $pneus
 * @property int $eclairage
 * @property int $extincteur
 * @property int $batterie
 * @property int $fuite
 * @property int $avertisseur
 * @property int $ceinture
 * @property int $retroviseur
 * @property string|null $observation
 * @property string|null $kilometrage
 * @property int|null $vhl_id
 * @property int|null $user_id
 * @property int|null $utilisateur_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @property-read Utilisateur|null $utilisateur
 * @property-read Vhl|null $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereAvertisseur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereBatterie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereCeinture($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereDateControle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereEclairage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereExtincteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereFrein($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereFuite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereKilometrage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck wherePneus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereRetroviseur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereUtilisateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereVhlId($value)
 * @mixin \Eloquent
 */
class DailyCheck extends Model
{

    use HasFactory;
    use SoftDeletes;


    protected $table = 'dailychecks';


    protected $fillable = [
        'dateControle',
        'frein',
        'pneus',
        'eclairage',
        'extincteur',
        'batterie',
        'fuite',
        'avertisseur',
        'ceinture',
        'retroviseur',
        'observation',
        'vhl_id',
        'user_id',
        'utilisateur_id',
        'kilometrage'
    ];
    protected $with = ['vhl', 'user', 'utilisateur'];






    public function vhl()
    {

        return $this->belongsTo(Vhl::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }


    public function utilisateur()
    {

        return $this->belongsTo(Utilisateur::class);
    }
}
