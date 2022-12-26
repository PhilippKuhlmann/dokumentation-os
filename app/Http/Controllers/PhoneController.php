<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index(Customer $customer)
    {
        return view('phone.index', [
            'customer' => $customer,
        ]);
    }

    public function create(Customer $customer)
    {
        return view('phone.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, Request $request)
    {

        $validated = $request->validate([
            'extension' => [],
            'manufacturer' => [],
            'model' => [],
            'serialNumber' => [],
            'ip1' => [],
            'port' => [],
            'mac' => [],
            'username' => [],
            'password' => [],
        ]);


        $customer->phones()->create($validated);

        return redirect(route('phone.index', $customer));
    }

    public function edit(Customer $customer, Phone $phone)
    {

        return view('phone.edit', [
            'customer' => $customer,
            'phone' => $phone,
        ]);
    }

    public function update(Customer $customer, Phone $phone, Request $request)
    {
        $validated = $request->validate([
            'extension' => [],
            'manufacturer' => [],
            'model' => [],
            'serialNumber' => [],
            'ip1' => [],
            'port' => [],
            'mac' => [],
            'username' => [],
            'password' => [],
        ]);

        $phone->update($validated);

        return redirect(route('phone.index', $customer));
    }

    public function destroy(Customer $customer, Phone $phone)
    {
        $phone->delete();

        return redirect(route('phone.index', $customer));
    }
}
