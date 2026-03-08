<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StatutVhl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StatutVhl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StatutVhl query()
 * @mixin \Eloquent
 */
class StatutVhl extends Model
{
    use HasFactory;

    protected $table = 'statut_vhl';
}
