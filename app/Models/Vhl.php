<?php

namespace App\Models;

use App\Models\Agence;
use App\Models\Statut;
use App\Models\Service;
use App\Models\Intitule;
use App\Models\Categorie;
use App\Models\Imagesvhl;
use App\Models\DailyCheck;
use App\Models\HistStatut;
use App\Models\Commentaire;
use App\Models\Kilometrage;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property int $id
 * @property string $matricule
 * @property string|null $marque
 * @property string|null $type
 * @property string|null $ww
 * @property string|null $chassis
 * @property string|null $puissance
 * @property string|null $date_mc
 * @property string|null $equipement
 * @property string|null $observation
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $agence_id
 * @property int|null $categorie_id
 * @property int|null $intitule_id
 * @property int|null $service_id
 * @property int|null $utilisateur_id
 * @property int|null $statut_id
 * @property-read Agence $agence
 * @property-read Categorie|null $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Commentaire> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, DailyCheck> $dailychecks
 * @property-read int|null $dailychecks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Imagesvhl> $images
 * @property-read int|null $images_count
 * @property-read Intitule|null $intitule
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Kilometrage> $kilometrages
 * @property-read int|null $kilometrages_count
 * @property-read Service|null $service
 * @property-read Statut|null $statut
 * @property-read \Illuminate\Database\Eloquent\Collection<int, HistStatut> $statutHistoriques
 * @property-read int|null $statut_historiques_count
 * @property-read Utilisateur|null $utilisateur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereAgenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereChassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereDateMc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereEquipement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereIntituleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereMarque($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereMatricule($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl wherePuissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereStatutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereUtilisateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereWw($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl withoutTrashed()
 * @mixin \Eloquent
 */
class Vhl extends Model
{
    use HasFactory, SoftDeletes;


    // protected $with = ['agence', 'categorie', 'intitule', 'service', 'statuts', 'images', 'kilometrages', 'comments', 'utilisateur'];
    protected $fillable = [
        'matricule',
        'marque',
        'type',
        'ww',
        'chassis',
        'puissance',
        'date_mc',
        'equipement',
        'observation',
        'agence_id',
        'categorie_id',
        'intitule_id',
        'service_id',
        'utilisateur_id',
        'statut_id'
    ];

    protected $hidden = [

        'updated_at',
        'deleted_at'

    ];



    public function agence()
    {

        return $this->belongsTo(Agence::class);
    }

    public function categorie()
    {

        return $this->belongsTo(Categorie::class);
    }
    public function intitule()
    {

        return $this->belongsTo(Intitule::class);
    }
    public function service()
    {

        return $this->belongsTo(Service::class);
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function images()
    {
        return $this->hasMany(Imagesvhl::class);
    }

    public function kilometrages()
    {
        return $this->hasMany(Kilometrage::class);
    }

    public function comments()
    {
        return $this->hasMany(Commentaire::class);
    }


    public function utilisateur()
    {

        return $this->belongsTo(Utilisateur::class);
    }
    public function statutHistoriques()
    {
        return $this->hasMany(HistStatut::class);
    }

    public function dailychecks()
    {
        return $this->hasMany(DailyCheck::class);
    }
}
