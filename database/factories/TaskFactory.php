<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'critical']),
            'status' => $this->faker->randomElement(['open', 'in_progress', 'closed']),
            'urgence' => $this->faker->randomElement(['low', 'medium', 'urgent']),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * Indicate that the task is open.
     */
    public function open(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'open',
        ]);
    }

    /**
     * Indicate that the task is in progress.
     */
    public function inProgress(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'in_progress',
        ]);
    }

    /**
     * Indicate that the task is closed.
     */
    public function closed(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'closed',
        ]);
    }

    /**
     * Indicate that the task is critical.
     */
    public function critical(): static
    {
        return $this->state(fn(array $attributes) => [
            'priority' => 'critical',
            'urgence' => 'urgent',
        ]);
    }
}
