<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Successful login.
     *
     * @return void
     */
    public function test_login_successful()
    {
        $credentials = [
            'login' => '10001',
            'password' => 'heslo123'
        ];

        $response = $this->withoutExceptionHandling()           
            ->postJson('/auth/login', $credentials);

        $response->assertStatus(200);
    }
}
