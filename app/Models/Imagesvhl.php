<?php

namespace App\Models;

use App\Models\Vhl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string|null $imagevhl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $vhl_id
 * @property-read mixed $imagevhl_url
 * @property-read mixed $remote_url
 * @property-read Vhl $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereImagevhl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereVhlId($value)
 * @mixin \Eloquent
 */
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
