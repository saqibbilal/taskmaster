<?php

namespace Tests\Feature\Models;

use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
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


    /**
     * a test to check if the new task has a title
     */
    public function test_task_has_a_title()
    {
        $task = Task::factory()->create();
        $this->assertModelExists($task);
    }


    /**
     * a test to check the default value of a new task
     */
    public function test_default_task_has_incomplete_status(): void
    {
        $task = Task::factory()->create();
        $this->assertTrue('incomplete'=== $task->status, "incomplete is not the default status of a new task");
    }

    /**
     * a test to check assigned values of title and description
     */
    public function test_it_creates_a_task_with_title(): void
    {
        $user = User::factory()->create();
        $task = Task::create([
            'user_id' => $user->id,
            'title' => "Write unit tests",
            'description' => "This is a dummy description",
            'status' => 'incomplete',
            'priority' => 'Medium'
        ]);

        $this->assertEquals('Write unit tests', $task->title);
        $this->assertTrue($task->description == "This is a dummy description", "description was not set properly");
    }

//    public function test_task_is_stored()
//    {
//        // save a task through the task controller
//        $task = Task::factory()->create();
//        $tasker = new TaskController();
//        $tasker->store($task);
//        $this->assertDatabaseHas('tasks', [
//            'title' => $task->title,
//            'description' => $task->description,
//            'status' => $task->status,
//            'priority' => $task->priority,
//        ]);
//    }


}
