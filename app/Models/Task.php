<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'urgence',
        'user_id',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Les valeurs par défaut des attributs.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'priority' => 'medium',
        'status' => 'open',
        'urgence' => 'medium',
    ];

    /**
     * Scope pour filtrer par statut
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope pour filtrer par priorité
     */
    public function scopePriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }

    /**
     * Scope pour filtrer par urgence
     */
    public function scopeUrgence($query, $urgence)
    {
        return $query->where('urgence', $urgence);
    }

    /**
     * Scope pour rechercher dans le titre et la description
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    /**
     * Scope pour les tâches récentes
     */
    public function scopeRecent($query, $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    /**
     * Vérifie si la tâche est en retard
     */
    public function isOverdue(): bool
    {
        return $this->created_at->diffInDays(now()) > 7 && $this->status !== 'closed';
    }

    /**
     * Formate la date de création
     */
    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    /**
     * Formate la date de mise à jour
     */
    public function getFormattedUpdatedAtAttribute(): string
    {
        return $this->updated_at->format('d/m/Y H:i');
    }

    /**
     * Obtient la couleur associée à la priorité
     */
    public function getPriorityColorAttribute(): string
    {
        return match ($this->priority) {
            'low' => 'green',
            'medium' => 'yellow',
            'high' => 'orange',
            'critical' => 'red',
            default => 'gray'
        };
    }

    /**
     * Obtient la couleur associée au statut
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'open' => 'blue',
            'in_progress' => 'purple',
            'closed' => 'gray',
            default => 'gray'
        };
    }

    /**
     * Obtient la couleur associée à l'urgence
     */
    public function getUrgenceColorAttribute(): string
    {
        return match ($this->urgence) {
            'low' => 'green',
            'medium' => 'yellow',
            'urgent' => 'red',
            default => 'gray'
        };
    }
}