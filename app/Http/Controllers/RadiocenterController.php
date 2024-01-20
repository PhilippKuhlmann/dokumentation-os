<?php

namespace App\Http\Controllers;

use App\Http\Requests\RadiocenterRequest;
use App\Models\Customer;
use App\Models\Radiocenter;

class RadiocenterController extends Controller
{
    public function index(Customer $customer)
    {
        $this->authorize('viewAny', Radiocenter::class);

        $radiocenters = $this->getFilteredQuery(Radiocenter::class, $customer)
                        ->get();

        return view('radiocenter.index', compact('customer', 'radiocenters'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', Radiocenter::class);

        $sites = $this->getSitesForCustomer($customer);

        $pilote_tones = Radiocenter::piloteTones();

        return view('radiocenter.create', compact('customer', 'sites', 'pilote_tones'));
    }

    public function store(Customer $customer, RadiocenterRequest $request)
    {
        $this->authorize('create', Radiocenter::class);

        $customer->radiocenters()->create($request->validated());

        return redirect(route('radiocenter.index', $customer));
    }

    public function edit(Customer $customer, Radiocenter $radiocenter)
    {
        $this->authorize('update', Radiocenter::class);

        $sites = $this->getSitesForCustomer($customer);

        $pilote_tones = Radiocenter::piloteTones();

        return view('radiocenter.edit', compact('customer', 'radiocenter', 'sites', 'pilote_tones'));
    }

    public function update(Customer $customer, Radiocenter $radiocenter, RadiocenterRequest $request)
    {
        $this->authorize('update', Radiocenter::class);

        $radiocenter->update($request->validated());

        return redirect(route('radiocenter.index', $customer))->withSuccess('Gespeichert!');
    }

    public function destroy(Customer $customer, Radiocenter $radiocenter)
    {
        $this->authorize('delete', Radiocenter::class);

        $radiocenter->delete();

        return redirect(route('radiocenter.index', $customer));
    }
}
