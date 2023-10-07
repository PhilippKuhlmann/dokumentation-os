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
        $this->authorize('viewAny', LicenseWindows::class);

        $licensewindows = $this->getFilteredQuery(LicenseWindows::class, $customer)
                        ->with('operatingSystem')
                        ->get();

        return view('licensewindows.index', compact('customer', 'licensewindows'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', LicenseWindows::class);

        $operatingSystems = OperatingSystem::all();

        return view('licensewindows.create', compact('customer', 'operatingSystems'));
    }

    public function store(Customer $customer, LicenseWindowsRequest $request)
    {
        $this->authorize('create', LicenseWindows::class);

        $customer->licensewindows()->create($request->validated());

        return redirect(route('licensewindows.index', $customer));
    }

    public function edit(Customer $customer, LicenseWindows $licensewindows)
    {
        $this->authorize('update', LicenseWindows::class);

        $operatingSystems = OperatingSystem::all();

        return view('licensewindows.edit', compact('customer', 'operatingSystems', 'licensewindows'));
    }

    public function update(Customer $customer, LicenseWindows $licensewindows, LicenseWindowsRequest $request)
    {
        $this->authorize('update', LicenseWindows::class);

        $licensewindows->update($request->validated());

        return redirect(route('licensewindows.index', $customer));
    }

    public function destroy(Customer $customer, LicenseWindows $licensewindows)
    {
        $this->authorize('delete', LicenseWindows::class);

        $licensewindows->delete();

        return redirect(route('licensewindows.index', $customer));
    }
}
