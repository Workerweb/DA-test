<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_tasks_are_sorted_by_priority()
    {
        Task::factory()->create([
            'title' => 'Срочная',
            'importance' => 5,
            'deadline' => now()->addDay(2),
        ]);

        Task::factory()->create([
            'title' => 'Не срочная',
            'importance' => 1,
            'deadline' => now()->addDays(10),
        ]);

        $response = $this->getJson('/api/tasks/priority');

        $response->assertStatus(200);
        $response->assertJsonPath('data.0.title', 'Срочная');
    }
}
