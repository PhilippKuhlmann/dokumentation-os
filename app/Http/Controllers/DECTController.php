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
        $this->authorize('viewAny', DECT::class);

        $dect = $this->getFilteredQuery(DECT::class, $customer)
                       ->get();

        return view('dect.index', compact('customer', 'dect'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', DECT::class);

        $sites = $this->getSitesForCustomer($customer);

        return view('dect.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, DECTRequest $request)
    {
        $this->authorize('create', DECT::class);

        $customer->dect()->create($request->validated());

        return redirect(route('dect.index', $customer));
    }

    public function edit(Customer $customer, DECT $dect)
    {
        $this->authorize('update', DECT::class);

        $sites = $this->getSitesForCustomer($customer);

        return view('dect.edit', compact('customer', 'sites', 'dect'));
    }

    public function update(Customer $customer, DECT $dect, DECTRequest $request)
    {
        $this->authorize('update', DECT::class);

        $dect->update($request->validated());

        return redirect(route('dect.index', $customer));
    }

    public function destroy(Customer $customer, DECT $dect)
    {
        $this->authorize('delete', DECT::class);

        $dect->delete();

        return redirect(route('dect.index', $customer));
    }
}
