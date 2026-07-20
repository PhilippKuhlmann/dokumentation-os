<?php

use App\Livewire\DeviceIpAddresses;
use App\Models\Customer;
use App\Models\Network;
use App\Models\Router;
use App\Models\Site;
use Livewire\Livewire;

function routerWithNetworks(): array
{
    $customer = Customer::factory()->create();
    $site = Site::factory()->create(['customer_id' => $customer->id]);

    $mgmt = Network::factory()->create([
        'customer_id' => $customer->id, 'site_id' => $site->id,
        'description' => 'Management', 'vlanId' => 30,
        'network' => '10.10.30.0', 'cidr' => '24', 'subnetmask' => '255.255.255.0',
        'gateway' => '10.10.30.1', 'dhcpStart' => '100', 'dhcpEnd' => '200',
    ]);
    $clients = Network::factory()->create([
        'customer_id' => $customer->id, 'site_id' => $site->id,
        'description' => 'Clients', 'vlanId' => 20,
        'network' => '10.10.20.0', 'cidr' => '24', 'subnetmask' => '255.255.255.0',
        'gateway' => '10.10.20.1', 'dhcpStart' => '100', 'dhcpEnd' => '200',
    ]);

    $router = Router::create([
        'customer_id' => $customer->id, 'site_id' => $site->id,
        'name' => 'RTR-Core', 'ip' => '10.10.30.1', 'port' => '443',
        'username' => 'admin', 'password' => 'x',
    ]);

    return [$customer, $router, $clients];
}

test('ein Router mit zusätzlicher IP erscheint im IPAM in beiden VLANs', function () {
    $this->actingAs(userWithPermissions(['network_viewAny']));
    [$customer, $router, $clients] = routerWithNetworks();

    // Zusätzliche Gateway-IP im Clients-VLAN
    $router->ipAddresses()->create([
        'customer_id' => $customer->id,
        'network_id' => $clients->id,
        'address' => '10.10.20.1',
        'label' => 'Gateway Clients',
    ]);

    $response = $this->get("/{$customer->slug}/ip-plan");
    $response->assertStatus(200);
    // Router in Management (.30.1) und in Clients (.20.1)
    $response->assertSee('10.10.30.1');
    $response->assertSee('10.10.20.1');
    $response->assertSee('RTR-Core (Gateway Clients)');
});

test('IP über die Livewire-Komponente hinzufügen und entfernen', function () {
    $this->actingAs(userWithPermissions(['router_update']));
    [$customer, $router, $clients] = routerWithNetworks();

    Livewire::test(DeviceIpAddresses::class, ['model' => $router, 'customer' => $customer])
        ->set('address', '10.10.20.1')
        ->set('network_id', $clients->id)
        ->set('label', 'Gateway Clients')
        ->call('add');

    expect($router->ipAddresses()->count())->toBe(1);

    $id = $router->ipAddresses()->first()->id;
    Livewire::test(DeviceIpAddresses::class, ['model' => $router, 'customer' => $customer])
        ->call('remove', $id);

    expect($router->ipAddresses()->count())->toBe(0);
});

test('VLAN-Option liefert das Netz-Präfix fürs clientseitige Vorbefüllen', function () {
    $this->actingAs(userWithPermissions(['router_update']));
    [$customer, $router, $clients] = routerWithNetworks();

    // Das data-prefix-Attribut (erste 3 Oktette) treibt das Alpine-Vorbefüllen des IP-Feldes
    Livewire::test(DeviceIpAddresses::class, ['model' => $router, 'customer' => $customer])
        ->assertSee('data-prefix="10.10.20."', false)
        ->assertSee('data-prefix="10.10.30."', false);
});

test('ohne Bearbeiten-Recht kann keine IP hinzugefügt werden', function () {
    $this->actingAs(userWithPermissions([])); // kein router_update
    [$customer, $router] = routerWithNetworks();

    Livewire::test(DeviceIpAddresses::class, ['model' => $router, 'customer' => $customer])
        ->set('address', '10.10.20.5')
        ->call('add')
        ->assertForbidden();

    expect($router->ipAddresses()->count())->toBe(0);
});

test('ungültige IP wird abgelehnt', function () {
    $this->actingAs(userWithPermissions(['router_update']));
    [$customer, $router] = routerWithNetworks();

    Livewire::test(DeviceIpAddresses::class, ['model' => $router, 'customer' => $customer])
        ->set('address', 'keine-ip')
        ->call('add')
        ->assertHasErrors('address');

    expect($router->ipAddresses()->count())->toBe(0);
});
