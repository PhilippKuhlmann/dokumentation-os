<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecurepointUTMRequest;
use App\Models\Customer;
use App\Models\SecurepointUTM;

class SecurepointUTMController extends Controller
{
    public function index(Customer $customer)
    {
        $securepointutms = $this->getFilteredQuery(SecurepointUTM::class, $customer)
                                ->get();

        return view('securepointutm.index', compact('customer', 'securepointutms'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('securepointutm.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, SecurepointUTMRequest $request)
    {
        $customer->securepointutms()->create($request->validated());

        return redirect(route('securepointutm.index', $customer));
    }

    public function edit(Customer $customer, SecurepointUTM $securepointutm)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('securepointutm.edit', compact('customer', 'securepointutm', 'sites'));
    }

    public function update(Customer $customer, SecurepointUTM $securepointutm, SecurepointUTMRequest $request)
    {
        $securepointutm->update($request->validated());

        return redirect(route('securepointutm.index', $customer));
    }

    public function destroy(Customer $customer, SecurepointUTM $securepointutm)
    {
        $securepointutm->delete();

        return redirect(route('securepointutm.index', $customer));
    }
}
