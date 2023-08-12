<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Models\Customer;
use App\Models\Phone;

class PhoneController extends Controller
{
    public function index(Customer $customer)
    {
        $phones = $this->getFilteredQuery(Phone::class, $customer)
                       ->get();

        return view('phone.index', compact('customer', 'phones'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('phone.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, PhoneRequest $request)
    {
        $customer->phones()->create($request->validated());

        return redirect(route('phone.index', $customer));
    }

    public function edit(Customer $customer, Phone $phone)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('phone.edit', compact('customer', 'sites', 'phone'));
    }

    public function update(Customer $customer, Phone $phone, PhoneRequest $request)
    {
        $phone->update($request->validated());

        return redirect(route('phone.index', $customer));
    }

    public function destroy(Customer $customer, Phone $phone)
    {
        $phone->delete();

        return redirect(route('phone.index', $customer));
    }
}
