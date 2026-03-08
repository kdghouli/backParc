<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nom
 * @property string $code_fournisseur
 * @property string $ville
 * @property string $adresse
 * @property string $tel
 * @property string $mail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereCodeFournisseur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereVille($value)
 * @mixin \Eloquent
 */
class Prestataire extends Model
{
    use HasFactory;
}
