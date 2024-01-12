<?php

use App\Models\Customer;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('user with permission aduser view any can acceess the page', function () {
    $permission = Permission::factory()->create(['name' => 'aduser_viewAny',]);
    $role = Role::factory()->create()->assignPermission($permission);

    $user = User::factory()->create(['role_id' => $role->id,]);
    $customer = Customer::factory()->create();

    $this->actingAs($user)->get(route('aduser.index', $customer))
        ->assertStatus(200);

    $this->actingAs($user)->get(route('customer.dashboard', $customer))
        ->assertSeeText('AD-User');
});

test('user without permission aduser view any cannot acceess the page', function () {
    $role = Role::factory()->create();

    $user = User::factory()->create(['role_id' => $role->id,]);
    $customer = Customer::factory()->create();

    $this->actingAs($user)->get(route('aduser.index', $customer))
        ->assertStatus(403);

    $this->actingAs($user)->get(route('customer.dashboard', $customer))
        ->assertDontSeeText('AD-User');
});
