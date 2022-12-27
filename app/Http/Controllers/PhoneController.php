<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Models\Customer;
use App\Models\Phone;

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

    public function store(Customer $customer, PhoneRequest $request)
    {
        $customer->phones()->create($request->validated());

        return redirect(route('phone.index', $customer));
    }

    public function edit(Customer $customer, Phone $phone)
    {

        return view('phone.edit', [
            'customer' => $customer,
            'phone' => $phone,
        ]);
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
