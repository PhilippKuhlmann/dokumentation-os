<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneSystemRequest;
use App\Models\Customer;
use App\Models\PhoneSystem;

class PhoneSystemController extends Controller
{
    public function index(Customer $customer)
    {
        return view('phonesystem.index', [
            'customer' => $customer,
        ]);
    }

    public function create(Customer $customer)
    {
        return view('phonesystem.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, PhoneSystemRequest $request)
    {
        $customer->phonesystems()->create($request->validated());

        return redirect(route('phoneSystem.index', $customer));
    }

    public function edit(Customer $customer, PhoneSystem $phoneSystem)
    {

        return view('phonesystem.edit', [
            'customer' => $customer,
            'phoneSystem' => $phoneSystem,
        ]);
    }

    public function update(Customer $customer, PhoneSystem $phoneSystem, PhoneSystemRequest $request)
    {
        $phoneSystem->update($request->validated());

        return redirect(route('phoneSystem.index', $customer));
    }

    public function destroy(Customer $customer, PhoneSystem $phoneSystem)
    {
        $phoneSystem->delete();

        return redirect(route('phoneSystem.index', $customer));
    }
}
