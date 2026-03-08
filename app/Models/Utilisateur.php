<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $nom
 * @property string|null $poste
 * @property string $tel
 * @property string $mail
 * @property int|null $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $agence_id
 * @property-read Agence|null $agence
 * @property-read Service|null $service
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereAgenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur wherePoste($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'poste',
        'mail',
        'tel',
        'agence_id',
        'service_id'
        ];



     public function agence()
   {

      return $this->belongsTo(Agence::class);
   }



   public function service()
   {

      return $this->belongsTo(Service::class);
   }

   public function vhls(){
        return $this->hasMany(Vhl::class);
           }


}
