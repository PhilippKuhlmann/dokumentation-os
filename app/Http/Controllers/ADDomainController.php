<?php

namespace App\Http\Controllers;

use App\Http\Requests\ADDomainRequest;
use App\Models\ADDomain;
use App\Models\Customer;
use Illuminate\Http\Request;

class ADDomainController extends Controller
{
    public function index(Customer $customer)
    {
        return view('addomain.index', [
            'customer' => $customer
        ]);
    }

    public function create(Customer $customer)
    {
        return view('addomain.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, ADDomainRequest $request)
    {
        $customer->addomains()->create($request->validated());

        return redirect(route('addomain.index', $customer));
    }

    public function edit(Customer $customer, ADDomain $addomain)
    {
        return view('addomain.edit', [
            'customer' => $customer,
            'addomain' => $addomain,
        ]);
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
