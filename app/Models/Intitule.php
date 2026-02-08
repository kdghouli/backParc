<?php

namespace App\Models;

use App\Models\Vhl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Intitule extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'location', 'ville', 'tel'];

    protected $hidden = ['created_at', 'updated_at'];

    public function vhls()
    {
        return $this->hasMany(Vhl::class);
    }
}
