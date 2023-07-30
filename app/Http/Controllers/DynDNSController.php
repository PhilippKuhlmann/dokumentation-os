<?php

namespace App\Http\Controllers;

use App\Http\Requests\DynDNSRequest;
use App\Models\Customer;
use App\Models\DynDNS;
use Illuminate\Http\Request;

class DynDNSController extends Controller
{
    public function index(Customer $customer)
    {
        return view('dyndns.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        return view('dyndns.create', compact('customer'));
    }

    public function store(Customer $customer, DynDNSRequest $request)
    {
        $customer->dyndns()->create($request->validated());

        return redirect(route('dyndns.index', $customer));
    }

    public function edit(Customer $customer, DynDNS $dyndns)
    {
        return view('dyndns.edit', compact('customer', 'dyndns'));
    }

    public function update(Customer $customer, DynDNS $dyndns, DynDNSRequest $request)
    {
        $dyndns->update($request->validated());

        return redirect(route('dyndns.index', $customer));
    }

    public function destroy(Customer $customer, DynDNS $dyndns)
    {
        $dyndns->delete();

        return redirect(route('dyndns.index', $customer));
    }
}
