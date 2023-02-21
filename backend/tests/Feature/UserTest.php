<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    // test para probar el registro de un usuario
    public function test_create_user()
    {
        $data = ['name' => 'Catalina', 'email' => 'cata@email.com', 'password' => '123456'];
        $response = $this->post('/api/register',$data);

        $response
            ->assertStatus(200)
            ->assertJson(['created' => true])
            ->assertDatabaseHas('users', $data);
    }
}
