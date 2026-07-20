<?php

use App\Models\Computer;
use App\Models\Customer;
use App\Models\OperatingSystem;
use App\Models\Site;

function customerWithSiteAndOs(): array
{
    $customer = Customer::factory()->create();
    $site = Site::factory()->create(['customer_id' => $customer->id]);
    $os = OperatingSystem::factory()->create(['name' => 'Windows 11']);

    return [$customer, $site, $os];
}

test('Computer anlegen (store) speichert und leitet zur Liste', function () {
    $this->actingAs(userWithPermissions(['computer_create']));
    [$customer, $site, $os] = customerWithSiteAndOs();

    $response = $this->post("/{$customer->slug}/computer", [
        'site_id' => $site->id,
        'name' => 'PC-Test',
        'manufacturer' => 'Dell',
        'operating_system_id' => $os->id,
    ]);

    $response->assertRedirect("/{$customer->slug}/computer");
    $this->assertDatabaseHas('computers', [
        'customer_id' => $customer->id,
        'site_id' => $site->id,
        'name' => 'PC-Test',
        'manufacturer' => 'Dell',
    ]);
});

test('Computer anlegen scheitert ohne Pflichtfelder', function () {
    $this->actingAs(userWithPermissions(['computer_create']));
    [$customer, $site, $os] = customerWithSiteAndOs();

    $this->post("/{$customer->slug}/computer", [
        'site_id' => $site->id,
        // name fehlt (required)
        'operating_system_id' => $os->id,
    ])->assertSessionHasErrors('name');

    expect(Computer::count())->toBe(0);
});

test('Computer bearbeiten (update) ändert die Daten', function () {
    $this->actingAs(userWithPermissions(['computer_update']));
    [$customer, $site, $os] = customerWithSiteAndOs();

    $computer = Computer::create([
        'customer_id' => $customer->id,
        'site_id' => $site->id,
        'name' => 'Alt',
        'operating_system_id' => $os->id,
    ]);

    $this->patch("/{$customer->slug}/computer/{$computer->id}", [
        'site_id' => $site->id,
        'name' => 'Neu',
        'operating_system_id' => $os->id,
    ])->assertRedirect("/{$customer->slug}/computer");

    expect($computer->fresh()->name)->toBe('Neu');
});

test('Computer löschen (destroy) entfernt den Datensatz', function () {
    $this->actingAs(userWithPermissions(['computer_delete']));
    [$customer, $site, $os] = customerWithSiteAndOs();

    $computer = Computer::create([
        'customer_id' => $customer->id,
        'site_id' => $site->id,
        'name' => 'Weg',
        'operating_system_id' => $os->id,
    ]);

    $this->delete("/{$customer->slug}/computer/{$computer->id}")
        ->assertRedirect("/{$customer->slug}/computer");

    $this->assertSoftDeleted('computers', ['id' => $computer->id]);
});

test('Computer-Liste zeigt vorhandene Geräte', function () {
    $this->actingAs(userWithPermissions(['computer_viewAny']));
    [$customer, $site, $os] = customerWithSiteAndOs();

    Computer::create([
        'customer_id' => $customer->id,
        'site_id' => $site->id,
        'name' => 'SichtbarerPC',
        'operating_system_id' => $os->id,
    ]);

    $this->get("/{$customer->slug}/computer")
        ->assertStatus(200)
        ->assertSee('SichtbarerPC');
});

test('ohne Berechtigung kein Anlegen möglich', function () {
    $this->actingAs(userWithPermissions([])); // keine Rechte
    [$customer, $site, $os] = customerWithSiteAndOs();

    $this->post("/{$customer->slug}/computer", [
        'site_id' => $site->id,
        'name' => 'Verboten',
        'operating_system_id' => $os->id,
    ])->assertStatus(403);

    expect(Computer::count())->toBe(0);
});
