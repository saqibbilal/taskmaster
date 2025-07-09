<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;

class TaskRequestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /*
     * test that store_task is actually creating a task in the db
     * */
    public function test_store_task_request()
    {
        $task = Task::factory()->create();
        $response = $this->post('/tasks', $task->toArray());

        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('tasks', ['title' => $task->title, 'description' => $task->description, 'status' => $task->status, 'priority' => $task->priority]);

    }


    /*
     * test that update_task is working
     * */
    public function test_update_task_request()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['title' => 'old title', 'description' => 'old description']);

        $response = $this->actingAs($user)->put(route('tasks.update', $task), ['title' => 'new title', 'description' => 'new description', 'status' => 'incomplete', 'priority' => 'Medium']);

        $this->assertDatabaseHas('tasks', ['title' => 'new title', 'description' => 'new description', 'status' => 'incomplete', 'priority' => 'Medium']);

    }

}
