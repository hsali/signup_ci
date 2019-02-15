<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_register_user()
    {
//       create user checking only
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'password' => 'secret'
        ];

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data["phone"],
            'password' => Hash::make($data['password']),
        ]);


        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);

        // user count check
    }
}
