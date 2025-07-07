<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

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


    public function test_store_task_request()
    {
        $task = Task::factory()->create();
        $response = $this->post('/tasks', $task->toArray());

        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('tasks', ['title' => 'Write tests']);

    }

    public function test_update_task_request()
    {

    }

}
