<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecorderRequest;
use App\Models\Customer;
use App\Models\Recorder;
use Illuminate\Http\Request;

class RecorderController extends Controller
{
    public function index(Customer $customer)
    {
        $recorders = $this->getFilteredQuery(Recorder::class, $customer)
                          ->get();

        return view('recorder.index', compact('customer', 'recorders'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('recorder.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, RecorderRequest $request)
    {
        $customer->recorders()->create($request->validated());

        return redirect(route('recorder.index', $customer))->withSuccess('Gespeichert!');
    }

    public function edit(Customer $customer, Recorder $recorder)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('recorder.edit', compact('customer', 'recorder', 'sites'));
    }

    public function update(Customer $customer, Recorder $recorder, RecorderRequest $request)
    {
        $recorder->update($request->validated());

        return redirect(route('recorder.index', $customer))->withSuccess('Gespeichert!');
    }

    public function destroy(Customer $customer, Recorder $recorder)
    {
        $recorder->delete();

        return redirect(route('recorder.index', $customer))->withSuccess('Gelöscht!');
    }
}
