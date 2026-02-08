<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
