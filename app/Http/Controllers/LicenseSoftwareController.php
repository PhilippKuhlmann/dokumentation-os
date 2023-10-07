<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseSoftwareRequest;
use App\Models\Customer;
use App\Models\LicenseSoftware;
use Illuminate\Http\Request;

class LicenseSoftwareController extends Controller
{
    public function index(Customer $customer)
    {
        $this->authorize('viewAny', LicenseSoftware::class);

        return view('licensesoftware.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', LicenseSoftware::class);

        return view('licensesoftware.create', compact('customer'));
    }

    public function store(Customer $customer, LicenseSoftwareRequest $request)
    {
        $this->authorize('create', LicenseSoftware::class);

        $customer->licensesoftware()->create($request->validated());

        return redirect(route('licensesoftware.index', $customer));
    }

    public function edit(Customer $customer, LicenseSoftware $licensesoftware)
    {
        $this->authorize('update', LicenseSoftware::class);

        return view('licensesoftware.edit', compact('customer', 'licensesoftware'));
    }

    public function update(Customer $customer, LicenseSoftware $licensesoftware, LicenseSoftwareRequest $request)
    {
        $this->authorize('update', LicenseSoftware::class);

        $licensesoftware->update($request->validated());

        return redirect(route('licensesoftware.index', $customer));
    }

    public function destroy(Customer $customer, LicenseSoftware $licensesoftware)
    {
        $this->authorize('delete', LicenseSoftware::class);

        $licensesoftware->delete();

        return redirect(route('licensesoftware.index', $customer));
    }
}
