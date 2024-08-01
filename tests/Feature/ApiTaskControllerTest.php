<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_tasks()
    {
        $response = $this->getJson('/api/tasks/list');

        $response->assertStatus(200);
    }

    public function test_get_user_tasks()
    {
        $user = User::factory()->create();
        Task::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'api')->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'description', 'tags', 'user_id', 'created_at', 'updated_at']
            ]);
    }

    public function test_update_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);
        $newData = [
            'name' => 'Updated Task',
            'description' => 'Updated Description'
        ];

        $response = $this->actingAs($user, 'api')->putJson("/api/tasks/{$task->id}", $newData);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Tarea actualizada con éxito.',
                'task' => [
                    'id' => $task->id,
                    'name' => 'Updated Task',
                    'description' => 'Updated Description'
                ]
            ]);
    }

    public function test_delete_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'api')->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Tarea eliminada correctamente.'
            ]);
    }
}
