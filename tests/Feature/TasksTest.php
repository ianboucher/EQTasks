<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Task;

class TasksTest extends TestCase
{
    // TODO: Set $userId & $taskId as instance variables

    /**
    * A test for the user's task collection
    *
    * @return void
    */
    public function testGetUserTasks()
    {
        $userId = User::first()->value('id');
        $user   = User::find($userId);
        $tasks  = $user->tasks()->get()->toArray();

        $response = $this->json('GET', '/api/v1.0.0/users/'.$userId.'/tasks');

        $response
            ->assertStatus(200)
            ->assertExactJson($tasks);
    }

    /**
    * A test for creating a new task
    *
    * @return void
    */
    public function testNewTask()
    {
        $userId = User::first()->value('id');

        $response = $this->json('POST', '/api/v1.0.0/users/'.$userId.'/tasks', [
            'description' => 'A new task from PHPUnit',
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'description' => 'A new task from PHPUnit',
            ]);
    }


    /**
    * A test for reading specified task
    *
    * @return void
    */
    public function testReadTask()
    {
        $userId = User::first()->value('id');
        $taskId = Task::orderBy('id', 'desc')->first()->id;

        $response = $this->json('GET', '/api/v1.0.0/users/'.$userId.'/tasks/'.$taskId);

        $response
            ->assertStatus(200)
            ->assertJson([
                'description' => 'A new task from PHPUnit',
            ]);
    }


    /**
    * A test for updating specified task
    *
    * @return void
    */
    public function testUpdatedTask()
    {
        $userId = User::first()->value('id');
        $taskId = Task::orderBy('id', 'desc')->first()->id;

        $response = $this->json('PUT', '/api/v1.0.0/users/'.$userId.'/tasks/'.$taskId, [
            'description' => 'An updated task from PHPUnit',
            'completed' => true,
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'description' => 'An updated task from PHPUnit',
                'completed' => true,
            ]);
    }


    /**
    * A test for deleting specified task
    *
    * @return void
    */
    public function testDeleteTask()
    {
        $userId = User::first()->value('id');
        $taskId = Task::orderBy('id', 'desc')->first()->id;

        echo '/api/v1.0.0/users/'.$userId.'/tasks/'.$taskId;

        $response = $this->json('DELETE', '/api/v1.0.0/users/'.$userId.'/tasks/'.$taskId);
        $response->assertStatus(200);
    }
}
