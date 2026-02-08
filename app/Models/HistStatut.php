<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\User;
use App\Models\Statut;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistStatut extends Model
{
  use HasFactory;

    protected $table = 'hist_statuts'; // Uncomment and set the table name if needed
    protected $fillable = [
        'vhl_id',
        'ancien_statut_id',
        'nouveau_statut_id',
        'user_id',
        'commentaire',
        'created_at',
        'updated_at'
    ];

    public function vhl()
    {
        return $this->belongsTo(Vhl::class);
    }

    public function ancienStatut()
    {
        return $this->belongsTo(Statut::class, 'ancien_statut_id');
    }

    public function nouveauStatut()
    {
        return $this->belongsTo(Statut::class, 'nouveau_statut_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
