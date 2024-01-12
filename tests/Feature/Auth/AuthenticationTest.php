<?php

use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $role = Role::factory()->create([
        'id' => Role::IS_TECHNIKER,
        'name' => 'Techniker'
    ]);

    $user = User::factory()->create(['role_id' => $role->id]);

    $response = $this->post('/login', [
        'username' => $user->username,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();

    $response->assertRedirect('/');
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
