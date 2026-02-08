<?php

namespace App\Models;

use App\Models\Vhl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kilometrage extends Model
{
    use HasFactory;


    public function vhl()
   {

      return $this->belongsTo(Vhl::class);
   }
}
