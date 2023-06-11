<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecurepointUTMRequest;
use App\Models\Customer;
use App\Models\SecurepointUTM;

class SecurepointUTMController extends Controller
{
    public function index(Customer $customer)
    {
        return view('securepointutm.index', [
            'customer' => $customer
        ]);
    }

    public function create(Customer $customer)
    {
        return view('securepointutm.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, SecurepointUTMRequest $request)
    {
        $customer->securepointutms()->create($request->validated());

        return redirect(route('securepointutm.index', $customer));
    }

    public function edit(Customer $customer, SecurepointUTM $securepointutm)
    {
        return view('securepointutm.edit', [
            'customer' => $customer,
            'securepointutm' => $securepointutm,
        ]);
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
