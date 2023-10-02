<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionsTest extends TestCase
{
    public function test_user_with_role_customer_read_write_cannot_access_admin_page(): void
    {
        $user = $this->createAndAuthenticateUserCustomerReadWrite();

        $response = $this->get('/admin');
        $response->assertStatus(403);
    }

    public function test_user_with_role_customer_read_only_cannot_access_admin_page(): void
    {
        $user = $this->createAndAuthenticateUserCustomerReadOnly();

        $response = $this->get('/admin');
        $response->assertStatus(403);
    }

    public function test_user_with_role_customer_read_write_can_only_access_assigned_customer(): void
    {
        $user = $this->createAndAuthenticateUserCustomerReadWrite();

        $customerTwo = Customer::factory()->create(['slug' => 'othercustomer']);

        $response = $this->get($user->customer->slug);
        $response->assertStatus(200);

        $response = $this->get($customerTwo->slug);
        $response->assertStatus(403);
    }

    public function test_user_with_role_customer_read_only_can_only_access_assigned_customer(): void
    {
        $user = $this->createAndAuthenticateUserCustomerReadOnly();

        $customerTwo = Customer::factory()->create(['slug' => 'othercustomer']);

        $response = $this->get($user->customer->slug);
        $response->assertStatus(200);

        $response = $this->get($customerTwo->slug);
        $response->assertStatus(403);
    }

    public function test_user_with_role_techniker_can_access_all_customer(): void
    {
        $user = $this->createAndAuthenticateUserTechniker();

        $customerOne = Customer::factory()->create(['slug' => 'customerone']);
        $customerTwo = Customer::factory()->create(['slug' => 'customertwo']);

        $response = $this->get($customerOne->slug);
        $response->assertStatus(200);

        $response = $this->get($customerTwo->slug);
        $response->assertStatus(200);
    }

    public function test_user_with_role_admin_can_access_everything(): void
    {
        $user = $this->createAndAuthenticateUserAdmin();

        $customerOne = Customer::factory()->create(['slug' => 'customerone']);
        $customerTwo = Customer::factory()->create(['slug' => 'customertwo']);

        $response = $this->get($customerOne->slug);
        $response->assertStatus(200);

        $response = $this->get($customerTwo->slug);
        $response->assertStatus(200);

        $response = $this->get('/admin');
        $response->assertStatus(200);
    }
}
