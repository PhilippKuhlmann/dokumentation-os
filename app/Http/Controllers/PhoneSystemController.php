<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneSystemRequest;
use App\Models\Customer;
use App\Models\PhoneSystem;

class PhoneSystemController extends Controller
{
    public function index(Customer $customer)
    {
        $phoneSystems = $this->getFilteredQuery(PhoneSystem::class, $customer)
                            ->get();

        return view('phonesystem.index', compact('customer', 'phoneSystems'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('phonesystem.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, PhoneSystemRequest $request)
    {
        $customer->phonesystems()->create($request->validated());

        return redirect(route('phoneSystem.index', $customer));
    }

    public function edit(Customer $customer, PhoneSystem $phoneSystem)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('phonesystem.edit', compact('customer', 'sites', 'phoneSystem'));
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
