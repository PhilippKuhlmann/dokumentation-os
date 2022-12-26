<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Wifi;
use Illuminate\Http\Request;

class WifiController extends Controller
{
    public function index(Customer $customer)
    {
        return view('wifi.index', [
            'customer' => $customer,
        ]);
    }

    public function create(Customer $customer)
    {
        return view('wifi.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, Request $request)
    {

        $validated = $request->validate([
            'ssid' => [],
            'password' => [],
            'vlan' => [],
            'encryption' => [],
        ]);


        $customer->wifis()->create($validated);

        return redirect(route('wifi.index', $customer));
    }

    public function edit(Customer $customer, Wifi $wifi)
    {
        return view('wifi.edit', [
            'customer' => $customer,
            'wifi' => $wifi,
        ]);
    }

    public function update(Customer $customer, Wifi $wifi, Request $request)
    {
        $validated = $request->validate([
            'ssid' => [],
            'password' => [],
            'vlan' => [],
            'encryption' => [],
        ]);

        $wifi->update($validated);

        return redirect(route('wifi.index', $customer));
    }

    public function destroy(Customer $customer, Wifi $wifi)
    {
        $wifi->delete();

        return redirect(route('wifi.index', $customer));
    }
}
