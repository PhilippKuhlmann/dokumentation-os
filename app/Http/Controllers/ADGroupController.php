<?php

namespace App\Http\Controllers;

use App\Http\Requests\ADGroupRequest;
use App\Models\ADGroup;
use App\Models\Customer;

class ADGroupController extends Controller
{

    public function index(Customer $customer)
    {
        return view('adgroup.index', [
            'customer' => $customer
        ]);
    }

    public function create(Customer $customer)
    {
        return view('adgroup.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, ADGroupRequest $request)
    {
        $customer->adgroups()->create($request->validated());

        return redirect(route('adgroup.index', $customer));
    }

    public function edit(Customer $customer, ADGroup $adgroup)
    {
        return view('adgroup.edit', [
            'customer' => $customer,
            'adgroup' => $adgroup,
        ]);
    }

    public function update(Customer $customer, ADGroup $adgroup, ADGroupRequest $request)
    {
        $adgroup->update($request->validated());

        return redirect(route('adgroup.index', $customer));
    }

    public function destroy(Customer $customer, ADGroup $adgroup)
    {
        $adgroup->delete();

        return redirect(route('adgroup.index', $customer));
    }
}
