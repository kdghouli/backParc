<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
