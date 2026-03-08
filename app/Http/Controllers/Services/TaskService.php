<?php

namespace App\Http\Controllers\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskService
{
    /**
     * Récupère toutes les tâches avec filtres optionnels
     */
    public function getAllTasks(array $filters = []): Collection
    {
        $query = Task::query();

        // Application des filtres
        if (isset($filters['status'])) {
            $query->status($filters['status']);
        }

        if (isset($filters['priority'])) {
            $query->priority($filters['priority']);
        }

        if (isset($filters['urgence'])) {
            $query->urgence($filters['urgence']);
        }

        if (isset($filters['search'])) {
            $query->search($filters['search']);
        }

        // Tri
        $sortField = $filters['sort_by'] ?? 'created_at';
        $sortOrder = $filters['sort_order'] ?? 'desc';
        $query->orderBy($sortField, $sortOrder);

        return $query->get();
    }

    /**
     * Récupère les tâches avec pagination
     */
    public function getPaginatedTasks(int $perPage = 15, array $filters = []): LengthAwarePaginator
    {
        $query = Task::query();

        if (isset($filters['status'])) {
            $query->status($filters['status']);
        }

        if (isset($filters['priority'])) {
            $query->priority($filters['priority']);
        }

        if (isset($filters['urgence'])) {
            $query->urgence($filters['urgence']);
        }

        return $query->paginate($perPage);
    }

    /**
     * Crée une nouvelle tâche
     */
    public function createTask(array $data): Task
    {
        // Ajouter l'utilisateur connecté si nécessaire

        if (auth()->guard()->check()) {
            $data['user_id'] = auth()->guard()->id();
        }

        return Task::create($data);
    }

    /**
     * Met à jour une tâche existante
     */
    public function updateTask(Task $task, array $data): Task
    {
        $task->update($data);
        return $task->fresh();
    }

    /**
     * Supprime une tâche
     */
    public function deleteTask(Task $task): bool
    {
        return $task->delete();
    }

    /**
     * Met à jour uniquement le statut d'une tâche
     */
    public function updateStatus(Task $task, string $status): Task
    {
        $task->update(['status' => $status]);
        return $task->fresh();
    }

    /**
     * Récupère les statistiques des tâches
     */
    public function getStatistics(): array
    {
        return [
            'total' => Task::count(),
            'by_status' => [
                'open' => Task::status('open')->count(),
                'in_progress' => Task::status('in_progress')->count(),
                'closed' => Task::status('closed')->count(),
            ],
            'by_priority' => [
                'low' => Task::priority('low')->count(),
                'medium' => Task::priority('medium')->count(),
                'high' => Task::priority('high')->count(),
                'critical' => Task::priority('critical')->count(),
            ],
            'by_urgence' => [
                'low' => Task::urgence('low')->count(),
                'medium' => Task::urgence('medium')->count(),
                'urgent' => Task::urgence('urgent')->count(),
            ],
            'recent' => Task::recent(7)->count(),
            'overdue' => Task::all()->filter->isOverdue()->count(),
        ];
    }
}
