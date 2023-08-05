<?php

namespace App\Http\Controllers;

use App\Http\Requests\ADDomainRequest;
use App\Models\ADDomain;
use App\Models\Customer;

class ADDomainController extends Controller
{
    public function index(Customer $customer)
    {
        return view('addomain.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        return view('addomain.create', compact('customer'));
    }

    public function store(Customer $customer, ADDomainRequest $request)
    {
        $customer->addomains()->create($request->validated());

        return redirect(route('addomain.index', $customer));
    }

    public function edit(Customer $customer, ADDomain $addomain)
    {
        return view('addomain.edit', compact('customer', 'addomain'));
    }

    public function update(Customer $customer, ADDomain $addomain, ADDomainRequest $request)
    {
        $addomain->update($request->validated());

        return redirect(route('addomain.index', $customer));
    }

    public function destroy(Customer $customer, ADDomain $addomain)
    {
        $addomain->delete();

        return redirect(route('addomain.index', $customer));
    }
}
