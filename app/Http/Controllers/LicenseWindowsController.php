<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseWindowsRequest;
use App\Models\Customer;
use App\Models\LicenseWindows;
use App\Models\OperatingSystem;
use Illuminate\Http\Request;

class LicenseWindowsController extends Controller
{
    public function index(Customer $customer)
    {
        $licensewindows = $this->getFilteredQuery(LicenseWindows::class, $customer)
                        ->with('operatingSystem')
                        ->get();

        return view('licensewindows.index', compact('customer', 'licensewindows'));
    }

    public function create(Customer $customer)
    {
        $operatingSystems = OperatingSystem::all();

        return view('licensewindows.create', compact('customer', 'operatingSystems'));
    }

    public function store(Customer $customer, LicenseWindowsRequest $request)
    {
        $customer->licensewindows()->create($request->validated());

        return redirect(route('licensewindows.index', $customer));
    }

    public function edit(Customer $customer, LicenseWindows $licensewindows)
    {
        $operatingSystems = OperatingSystem::all();

        return view('licensewindows.edit', compact('customer', 'operatingSystems', 'licensewindows'));
    }

    public function update(Customer $customer, LicenseWindows $licensewindows, LicenseWindowsRequest $request)
    {
        $licensewindows->update($request->validated());

        return redirect(route('licensewindows.index', $customer));
    }

    public function destroy(Customer $customer, LicenseWindows $licensewindows)
    {
        $licensewindows->delete();

        return redirect(route('licensewindows.index', $customer));
    }
}
