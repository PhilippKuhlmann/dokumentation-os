<?php

namespace App\Http\Controllers;

use App\Http\Requests\NetworkRequest;
use App\Models\Customer;
use App\Models\Network;
use App\Models\Site;

class NetworkController extends Controller
{

    public function index(Customer $customer)
    {
        $networks = $this->getFilteredQuery(Network::class, $customer)
                         ->orderBy('vlanId')
                         ->get();

        return view('network.index', compact('customer', 'networks'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('network.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, NetworkRequest $request)
    {
        $customer->networks()->create($request->validated());

        return redirect(route('network.index', $customer))->withSuccess('Gespeichert!');
    }

    public function edit(Customer $customer, Network $network)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('network.edit', compact('customer', 'network', 'sites'));
    }

    public function update(Customer $customer, Network $network, NetworkRequest $request)
    {
        $network->update($request->validated());

        return redirect(route('network.index', $customer))->withSuccess('Gespeichert!');
    }

    public function destroy(Customer $customer, Network $network)
    {
        $network->delete();

        return redirect(route('network.index', $customer))->withSuccess('Gelöscht!');
    }

}
