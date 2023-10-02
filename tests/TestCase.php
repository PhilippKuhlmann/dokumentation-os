<?php

namespace Tests;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }


    protected function createAndAuthenticateUserCustomerReadWrite()
    {
        $role = Role::factory()->create([
            'id' => 99,
        ]);

        $customer = Customer::factory()->create();

        $user = User::factory()->create([
            'role_id' => $role->id,
            'customer_id' => $customer->id,
        ]);

        $this->actingAs($user);

        return $user;
    }

    protected function createAndAuthenticateUserCustomerReadOnly()
    {
        $role = Role::factory()->create([
            'id' => 98,
        ]);

        $customer = Customer::factory()->create();

        $user = User::factory()->create([
            'role_id' => $role->id,
            'customer_id' => $customer->id,
        ]);

        $this->actingAs($user);

        return $user;
    }

    protected function createAndAuthenticateUserTechniker()
    {
        $role = Role::factory()->create([
            'id' => 2,
        ]);

        $customer = Customer::factory()->create();

        $user = User::factory()->create([
            'role_id' => $role->id
        ]);

        $this->actingAs($user);

        return $user;
    }

    protected function createAndAuthenticateUserAdmin()
    {
        $role = Role::factory()->create([
            'id' => 1,
        ]);

        $customer = Customer::factory()->create();

        $user = User::factory()->create([
            'role_id' => $role->id
        ]);

        $this->actingAs($user);

        return $user;
    }
}
