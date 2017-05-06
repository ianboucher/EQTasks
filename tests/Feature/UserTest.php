<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    /**
    * A test for the users collection
    *
    * @return void
    */
    public function testGetUsers()
    {
        $users    = User::all();
        $response = $this->json('GET', '/api/v1.0.0/users/'.$userId.'/tasks');

        $response
            ->assertStatus(200)
            ->assertExactJson($users);
    }


    /**
    * A test for creating a new user
    *
    * @return void
    */
    public function testCreateUser()
    {
        $response = $this->json('POST', '/api/v1.0.0/users', [
            'name' => 'Bill Gates',
            'email' => 'bill@microsoft.com',
            'password' => 'secret'
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Bill Gates',
                'email' => 'bill@microsoft.com',
            ]);
    }


    /**
    * A test for reading specified user
    *
    * @return void
    */
    public function testReadUser()
    {
        $userId = User::where('name', 'Bill Gates')->value('id');

        $response = $this->json('GET', '/api/v1.0.0/users/'.$userId);

        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Bill Gates',
                'email' => 'bill@microsoft.com',
            ]);
    }


    /**
    * A test for updating specified user
    *
    * @return void
    */
    public function testUpdateUser()
    {
        $userId = User::where('name', 'Bill Gates')->value('id');

        $response = $this->json('PUT', '/api/v1.0.0/users/'.$userId, [
            'name' => 'Bill Gates',
            'email' => 'bill@gatesfoundation.org',
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Bill Gates',
                'email' => 'bill@gatesfoundation.org',
            ]);
    }


    /**
    * A test for deleting specified user
    *
    * @return void
    */
    public function testDeleteUser()
    {
        $userId = User::where('name', 'Bill Gates')->value('id');

        $response = $this->json('DELETE', '/api/v1.0.0/users/'.$userId);
        $response->assertStatus(200);
    }
}
