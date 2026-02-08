<?php

namespace App\Models;


use App\Models\Vhl;
use App\Models\User;
use App\Models\Kilometrage;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyCheck extends Model
{

    use HasFactory;


    protected $table = 'dailychecks';


    protected $fillable = ['dateControle','frein','pneus','eclairage',
    'extincteur','batterie','fuite','avertisseur','ceinture','retroviseur',
    'observation','vhl_id','user_id','utilisateur_id','kilometrage'];
    protected $with=['vhl','user','utilisateur'];






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
