<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    public function vhls(){
        return $this->hasMany(Vhl::class);
           }


           public function utilisateurs(){
        return $this->hasMany(Utilisateur::class);
           }
}
