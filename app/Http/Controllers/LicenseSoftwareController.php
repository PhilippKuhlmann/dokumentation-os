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
        return view('licensesoftware.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        return view('licensesoftware.create', compact('customer'));
    }

    public function store(Customer $customer, LicenseSoftwareRequest $request)
    {
        $customer->licensesoftware()->create($request->validated());

        return redirect(route('licensesoftware.index', $customer));
    }

    public function edit(Customer $customer, LicenseSoftware $licensesoftware)
    {
        return view('licensesoftware.edit', compact('customer', 'licensesoftware'));
    }

    public function update(Customer $customer, LicenseSoftware $licensesoftware, LicenseSoftwareRequest $request)
    {
        $licensesoftware->update($request->validated());

        return redirect(route('licensesoftware.index', $customer));
    }

    public function destroy(Customer $customer, LicenseSoftware $licensesoftware)
    {
        $licensesoftware->delete();

        return redirect(route('licensesoftware.index', $customer));
    }
}
