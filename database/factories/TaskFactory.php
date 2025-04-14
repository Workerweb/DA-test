<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\TaskStatus;
use App\Models\Task;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(array_column(TaskStatus::cases(), 'value')),
            'importance' => $this->faker->numberBetween(1, 5),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
        ];
    }
}