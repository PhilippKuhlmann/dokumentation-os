<?php

namespace App\Http\Controllers;

use App\Http\Requests\DECTRequest;
use App\Models\Customer;
use App\Models\DECT;
use Illuminate\Http\Request;

class DECTController extends Controller
{
    public function index(Customer $customer)
    {
        $dect = $this->getFilteredQuery(DECT::class, $customer)
                       ->get();

        return view('dect.index', compact('customer', 'dect'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('dect.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, DECTRequest $request)
    {
        $customer->dect()->create($request->validated());

        return redirect(route('dect.index', $customer));
    }

    public function edit(Customer $customer, DECT $dect)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('dect.edit', compact('customer', 'sites', 'dect'));
    }

    public function update(Customer $customer, DECT $dect, DECTRequest $request)
    {
        $dect->update($request->validated());

        return redirect(route('dect.index', $customer));
    }

    public function destroy(Customer $customer, DECT $dect)
    {
        $dect->delete();

        return redirect(route('dect.index', $customer));
    }
}
