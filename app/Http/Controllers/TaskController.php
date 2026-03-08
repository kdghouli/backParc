<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\TaskService;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Affiche la liste des tâches
     */
    public function index(Request $request): JsonResponse



    {
        $filters = $request->only(['status', 'priority', 'urgence']);
        $tasks = $this->taskService->getAllTasks($filters);

        return response()->json([
            'success' => true,
            'data' => TaskResource::collection($tasks),
            'message' => 'Tâches récupérées avec succès',
            'status' => 200
        ]);
    }

    /**
     * Affiche les statistiques
     */
    public function statistics(): JsonResponse
    {
        $statistics = $this->taskService->getStatistics();

        return response()->json([
            'success' => true,
            'data' => $statistics,
            'message' => 'Statistiques récupérées avec succès',
            'status' => 200
        ]);
    }

    /**
     * Crée une nouvelle tâche
     */
    public function store(TaskRequest $request): JsonResponse
    {
        try {
            $task = $this->taskService->createTask($request->validated());

            return response()->json([
                'success' => true,
                'data' => new TaskResource($task),
                'message' => 'Tâche créée avec succès',
                'status' => 201
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de la tâche',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    /**
     * Affiche une tâche spécifique
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => new TaskResource($task),
            'message' => 'Tâche récupérée avec succès',
            'status' => 200
        ]);
    }

    /**
     * Met à jour une tâche
     */
    public function update(TaskRequest $request, Task $task): JsonResponse
    {
        try {
            $updatedTask = $this->taskService->updateTask($task, $request->validated());

            return response()->json([
                'success' => true,
                'data' => new TaskResource($updatedTask),
                'message' => 'Tâche mise à jour avec succès',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour de la tâche',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    /**
     * Met à jour uniquement le statut
     */
    public function updateStatus(Request $request, Task $task): JsonResponse
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,closed'
        ]);

        try {
            $updatedTask = $this->taskService->updateStatus($task, $request->status);

            return response()->json([
                'success' => true,
                'data' => new TaskResource($updatedTask),
                'message' => 'Statut mis à jour avec succès',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour du statut',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    /**
     * Supprime une tâche
     */
    public function destroy(Task $task): JsonResponse
    {
        try {
            $this->taskService->deleteTask($task);

            return response()->json([
                'success' => true,
                'message' => 'Tâche supprimée avec succès',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de la tâche',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
