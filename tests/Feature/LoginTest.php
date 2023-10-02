<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
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

    public function test_login_user_with_role_techniker(): void
    {
        $user = $this->createAndAuthenticateUserTechniker();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->followRedirects($response)->assertViewIs('customer.search');
    }

    public function test_login_user_with_role_customer_read_only(): void
    {
        $user = $this->createAndAuthenticateUserCustomerReadOnly();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->followRedirects($response)->assertViewIs('customer.dashboard');
    }

    public function test_login_user_with_role_customer_read_write(): void
    {
        $user = $this->createAndAuthenticateUserCustomerReadWrite();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $this->followRedirects($response)->assertViewIs('customer.dashboard');
    }
}
