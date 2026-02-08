<?php

namespace App\Models;



use App\Models\Vhl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Categorie extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function vhls(){
        return $this->hasMany(Vhl::class);
           }
}
