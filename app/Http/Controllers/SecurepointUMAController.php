<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecurepointUMARequest;
use App\Models\Customer;
use App\Models\SecurepointUMA;
use Illuminate\Http\Request;

class SecurepointUMAController extends Controller
{
    public function index(Customer $customer)
    {
        return view('securepointuma.index', [
            'customer' => $customer
        ]);
    }

    public function create(Customer $customer)
    {
        return view('securepointuma.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, SecurepointUMARequest $request)
    {
        $customer->securepointumas()->create($request->validated());

        return redirect(route('securepointuma.index', $customer));
    }

    public function edit(Customer $customer, SecurepointUMA $securepointuma)
    {
        return view('securepointuma.edit', [
            'customer' => $customer,
            'securepointuma' => $securepointuma,
        ]);
    }

    public function update(Customer $customer, SecurepointUMA $securepointuma, SecurepointUMARequest $request)
    {
        $securepointuma->update($request->validated());

        return redirect(route('securepointuma.index', $customer));
    }

    public function destroy(Customer $customer, SecurepointUMA $securepointuma)
    {
        $securepointuma->delete();

        return redirect(route('securepointuma.index', $customer));
    }
}
