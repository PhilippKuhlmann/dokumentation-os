<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PhoneSystem;
use Illuminate\Http\Request;

class PhoneSystemController extends Controller
{
    public function index(Customer $customer)
    {
        return view('phoneSystem.index', [
            'customer' => $customer,
        ]);
    }

    public function create(Customer $customer)
    {
        return view('phoneSystem.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, Request $request)
    {

        $validated = $request->validate([
            'manufacturer' => [],
            'type' => [],
            'model' => [],
            'serialNumber' => [],
            'ip1' => [],
            'ip2' => [],
            'ip3' => [],
            'port' => [],
            'username' => [],
            'password' => [],
        ]);


        $customer->phonesystems()->create($validated);

        return redirect(route('phoneSystem.index', $customer));
    }

    public function edit(Customer $customer, PhoneSystem $phoneSystem)
    {

        return view('phoneSystem.edit', [
            'customer' => $customer,
            'phoneSystem' => $phoneSystem,
        ]);
    }

    public function update(Customer $customer, PhoneSystem $phoneSystem, Request $request)
    {
        $validated = $request->validate([
            'manufacturer' => [],
            'type' => [],
            'model' => [],
            'serialNumber' => [],
            'ip1' => [],
            'ip2' => [],
            'ip3' => [],
            'port' => [],
            'username' => [],
            'password' => [],
        ]);

        $phoneSystem->update($validated);

        return redirect(route('phoneSystem.index', $customer));
    }

    public function destroy(Customer $customer, PhoneSystem $phoneSystem)
    {
        $phoneSystem->delete();

        return redirect(route('phoneSystem.index', $customer));
    }
}
