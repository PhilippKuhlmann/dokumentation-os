<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleAndPermissonTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_with_permission_aduser_viewAny_can_acceess_the_page()
    {
        $permission = Permission::factory()->create(['name' => 'aduser_viewAny',]);
        $role = Role::factory()->create()->assignPermission($permission);

        $user = User::factory()->create(['role_id' => $role->id,]);
        $customer = Customer::factory()->create();

        $this->actingAs($user)->get(route('aduser.index', $customer))
            ->assertStatus(200);

        $this->actingAs($user)->get(route('customer.dashboard', $customer))
            ->assertSeeText('AD-User');
    }

    public function test_user_without_permission_aduser_viewAny_cannot_acceess_the_page()
    {
        $role = Role::factory()->create();

        $user = User::factory()->create(['role_id' => $role->id,]);
        $customer = Customer::factory()->create();

        $this->actingAs($user)->get(route('aduser.index', $customer))
            ->assertStatus(403);

        $this->actingAs($user)->get(route('customer.dashboard', $customer))
            ->assertDontSeeText('AD-User');
    }
}
