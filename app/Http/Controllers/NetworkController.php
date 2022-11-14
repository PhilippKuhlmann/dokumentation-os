<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Network;

class NetworkController extends Controller
{

    public function index(Customer $customer)
    {
        return view('network.index', [
            'customer' => $customer,
        ]);
    }

    public function show(Customer $customer, Network $network)
    {
        return view('network.show', [
            'customer' => $customer,
            'network' => $network,
        ]);
    }

    public function create(Customer $customer)
    {
        return view('network.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, Request $request)
    {
        $validated = $request->validate([
            'vlanId' => [],
            'description' => [],
            'network' => ['max:15'],
            'subnetmask' => ['max:15'],
            'cidr' => ['max:3'],
            'gateway' => ['max:15'],
            'dns1' => ['max:15'],
            'dns2' => ['max:15'],
            'dhcpStart' => ['max:3'],
            'dhcpEnd' => ['max:3'],
        ]);

        $customer->networks()->create($validated);

        return redirect('/' . $customer->slug . '/network');
    }

    public function edit(Customer $customer, Network $network)
    {
        return view('network.edit', [
            'customer' => $customer,
            'network' => $network,
        ]);
    }

    public function update(Customer $customer, Network $network, Request $request)
    {
        $validated = $request->validate([
            'vlanId' => [],
            'description' => [],
            'network' => ['max:15'],
            'subnetmask' => ['max:15'],
            'cidr' => ['max:3'],
            'gateway' => ['max:15'],
            'dns1' => ['max:15'],
            'dns2' => ['max:15'],
            'dhcpStart' => ['max:3'],
            'dhcpEnd' => ['max:3'],
        ]);

        $network->update($validated);

        return redirect('/' . $customer->slug . '/network' . '/' . $network->id);
    }

    public function destroy(Customer $customer, Network $network)
    {
        $network->delete();

        return redirect('/' . $customer->slug . '/network');
    }

}
