<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer quelques tâches de test
        $tasks = [
            [
                'title' => 'Finaliser le rapport mensuel',
                'description' => 'Préparer et finaliser le rapport pour la réunion de demain',
                'priority' => 'high',
                'status' => 'in_progress',
                'urgence' => 'urgent',
            ],
            [
                'title' => 'Mettre à jour la documentation',
                'description' => 'Mettre à jour le README et la documentation technique',
                'priority' => 'medium',
                'status' => 'open',
                'urgence' => 'medium',
            ],
            [
                'title' => 'Corriger le bug #1234',
                'description' => 'Le formulaire de connexion ne fonctionne pas sur mobile',
                'priority' => 'critical',
                'status' => 'open',
                'urgence' => 'urgent',
            ],
            [
                'title' => 'Préparer la présentation client',
                'description' => 'Créer les slides pour la réunion de jeudi',
                'priority' => 'high',
                'status' => 'closed',
                'urgence' => 'medium',
            ],
            [
                'title' => 'Mettre à jour les dépendances',
                'description' => 'Mettre à jour npm et composer packages',
                'priority' => 'low',
                'status' => 'open',
                'urgence' => 'low',
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }

        // Créer des tâches supplémentaires avec Faker
        Task::factory()->count(20)->create();
    }
}