<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TasksTest extends TestCase
{
    /**
    * A basic test example for tasks
    *
    * @return void
    */
    public function testNewTask()
    {
        $response = $this->json('POST', '/api/v1.0.0/users/11/tasks', [
            'description' => 'A task from PHPUnit',
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'description' => 'A task from PHPUnit',
            ]);
    }
}
