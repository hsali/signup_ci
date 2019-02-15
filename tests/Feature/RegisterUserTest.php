<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function user_can_register()
    {
        $user = [
            'name' => 'Joe ,Smith',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post(route("register"), $user);
        $response
            ->assertRedirect(route("home"));
//            ->assertSessionHas('status', 'Zodra uw account is goedgekeurd ontvangt u een email');



        $collection = collect($user)->except(["password",'password_confirmation']);
        $this->assertDatabaseHas('users', $collection->all());
    }
}
