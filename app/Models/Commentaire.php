<?php

namespace App\Models;

use App\Models\Vhl;
use App\Models\User;
use App\Models\Statut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'vhl_id',
        'active',
        'user_id',
        'kilometrage',
        'statut_id',
        'parent_id',
    ];

    protected $with = [
        'user',
        'statut',
        'replies',
        'vhl',
    ];

    public function vhl()
    {

        return $this->belongsTo(Vhl::class);
    }

    public function replies()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('updated_at', 'desc')->with('replies');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }
}
