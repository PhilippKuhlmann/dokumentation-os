<?php

namespace App\Http\Controllers;

use App\Http\Requests\WifiRequest;
use App\Models\Customer;
use App\Models\Wifi;

class WifiController extends Controller
{
    public function index(Customer $customer)
    {
        $this->authorize('viewAny', Wifi::class);

        $wifis = $this->getFilteredQuery(Wifi::class, $customer)
                      ->get();

        return view('wifi.index', compact('customer', 'wifis'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', Wifi::class);

        $sites = $this->getSitesForCustomer($customer);

        return view('wifi.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, WifiRequest $request)
    {
        $this->authorize('create', Wifi::class);

        $customer->wifis()->create($request->validated());

        return redirect(route('wifi.index', $customer));
    }

    public function edit(Customer $customer, Wifi $wifi)
    {
        $this->authorize('update', Wifi::class);

        $sites = $this->getSitesForCustomer($customer);

        return view('wifi.edit', compact('customer', 'wifi', 'sites'));
    }

    public function update(Customer $customer, Wifi $wifi, WifiRequest $request)
    {
        $this->authorize('update', Wifi::class);

        $wifi->update($request->validated());

        return redirect(route('wifi.index', $customer));
    }

    public function destroy(Customer $customer, Wifi $wifi)
    {
        $this->authorize('delete', Wifi::class);

        $wifi->delete();

        return redirect(route('wifi.index', $customer));
    }
}
