<?php

namespace App\Models;

use App\Models\Vhl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Imagesvhl extends Model
{
    //protected $with = ['vhl'];
    protected $fillable=['imagevhl','vhl_id'];
    protected $hidden=['created_at','updated_at'];




    public function vhl(){

        return $this->belongsTo(Vhl::class);


     }
      // Accesseur pour l'URL complète de l'image
    public function getImagevhlUrlAttribute()
    {
        return asset('storage/' . $this->imagevhl);
    }
    protected $appends = ['imagevhl_url', 'remote_url'];

public function getImagevhlUrlAttribute2()
{
    return asset('storage/'.$this->imagevhl);
}

public function getRemoteUrlAttribute()
{
    return $this->remote_path ?
        rtrim(env('SECONDARY_SITE_PUBLIC_URL'), '/').'/'.ltrim($this->remote_path, '/') :
        null;
}
}
