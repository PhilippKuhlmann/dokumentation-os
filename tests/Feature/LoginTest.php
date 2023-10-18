<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_user_with_role_admin(): void
    {
        $user = $this->createAndAuthenticateUserAdmin();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->followRedirects($response)->assertViewIs('admin.index');
    }

    public function test_login_user_without_customer(): void
    {
        $user = $this->createAndAuthenticateUserWithoutCustomer();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->followRedirects($response)->assertViewIs('customer.search');
    }

    public function test_login_user_with_role_customer(): void
    {
        $user = $this->createAndAuthenticateUserWithCustomer();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->followRedirects($response)->assertViewIs('customer.dashboard');
    }

}
