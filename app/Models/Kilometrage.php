<?php

namespace App\Models;

use App\Models\Vhl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $kilometrage
 * @property string $date
 * @property string $observation
 * @property int|null $vhl_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Vhl|null $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereKilometrage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereVhlId($value)
 * @mixin \Eloquent
 */
class Kilometrage extends Model
{
    use HasFactory;


    public function vhl()
   {

      return $this->belongsTo(Vhl::class);
   }
}
