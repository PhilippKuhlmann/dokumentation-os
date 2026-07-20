<?php

use App\Models\Role;
use App\Models\User;

test('Admin-Dashboard zeigt Statistik-Kacheln', function () {
    $adminRole = Role::factory()->create(['id' => Role::IS_ADMIN]);
    $admin = User::factory()->create(['role_id' => $adminRole->id]);
    $this->actingAs($admin);

    $this->get('/admin')
        ->assertStatus(200)
        ->assertSee('Administration')
        ->assertSee('Benutzer')
        ->assertSee('Kunden')
        ->assertSee('Rollen');
});

test('Nicht-Admin wird vom Admin-Dashboard abgewiesen', function () {
    $this->actingAs(userWithPermissions([]));

    $this->get('/admin')->assertStatus(403);
});
