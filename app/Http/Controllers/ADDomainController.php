<?php

namespace App\Http\Controllers;

use App\Http\Requests\ADDomainRequest;
use App\Models\ADDomain;
use App\Models\Customer;

class ADDomainController extends Controller
{
    public function index(Customer $customer)
    {
        $this->authorize('viewAny', ADDomain::class);

        return view('addomain.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', ADDomain::class);

        return view('addomain.create', compact('customer'));
    }

    public function store(Customer $customer, ADDomainRequest $request)
    {
        $this->authorize('create', ADDomain::class);

        $customer->addomains()->create($request->validated());

        return redirect(route('addomain.index', $customer));
    }

    public function edit(Customer $customer, ADDomain $addomain)
    {
        $this->authorize('update', ADDomain::class);

        return view('addomain.edit', compact('customer', 'addomain'));
    }

    public function update(Customer $customer, ADDomain $addomain, ADDomainRequest $request)
    {
        $this->authorize('update', ADDomain::class);

        $addomain->update($request->validated());

        return redirect(route('addomain.index', $customer));
    }

    public function destroy(Customer $customer, ADDomain $addomain)
    {
        $this->authorize('delete', ADDomain::class);

        $addomain->delete();

        return redirect(route('addomain.index', $customer));
    }
}
