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
