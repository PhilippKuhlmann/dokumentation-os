<?php

namespace App\Http\Controllers;

use App\Http\Requests\NetworkRequest;
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

    public function store(Customer $customer, NetworkRequest $request)
    {
        $customer->networks()->create($request->validated());

        return redirect('/' . $customer->slug . '/network');
    }

    public function edit(Customer $customer, Network $network)
    {
        return view('network.edit', [
            'customer' => $customer,
            'network' => $network,
        ]);
    }

    public function update(Customer $customer, Network $network, NetworkRequest $request)
    {
        $network->update($request->validated());

        return redirect('/' . $customer->slug . '/network' . '/' . $network->id);
    }

    public function destroy(Customer $customer, Network $network)
    {
        $network->delete();

        return redirect('/' . $customer->slug . '/network');
    }

}
