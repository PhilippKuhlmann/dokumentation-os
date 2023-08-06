<?php

namespace App\Http\Controllers;

use App\Http\Requests\WifiRequest;
use App\Models\Customer;
use App\Models\Wifi;

class WifiController extends Controller
{
    public function index(Customer $customer)
    {
        $wifis = $this->getFilteredQuery(Wifi::class, $customer)
                      ->get();

        return view('wifi.index', compact('customer', 'wifis'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('wifi.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, WifiRequest $request)
    {
        $customer->wifis()->create($request->validated());

        return redirect(route('wifi.index', $customer));
    }

    public function edit(Customer $customer, Wifi $wifi)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('wifi.edit', compact('customer', 'wifi', 'sites'));
    }

    public function update(Customer $customer, Wifi $wifi, WifiRequest $request)
    {
        $wifi->update($request->validated());

        return redirect(route('wifi.index', $customer));
    }

    public function destroy(Customer $customer, Wifi $wifi)
    {
        $wifi->delete();

        return redirect(route('wifi.index', $customer));
    }
}
