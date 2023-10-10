<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseAccessRequest;
use App\Models\Customer;
use App\Models\LicenseAccess;
use Illuminate\Http\Request;

class LicenseAccessController extends Controller
{
    public function index(Customer $customer)
    {
        $this->authorize('viewAny', LicenseAccess::class);

        return view('licenseaccess.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', LicenseAccess::class);

        return view('licenseaccess.create', compact('customer'));
    }

    public function store(Customer $customer, LicenseAccessRequest $request)
    {
        $this->authorize('create', LicenseAccess::class);

        $customer->licenseaccesses()->create($request->validated());

        return redirect(route('licenseaccess.index', $customer));
    }

    public function edit(Customer $customer, LicenseAccess $licenseaccess)
    {
        $this->authorize('update', LicenseAccess::class);

        return view('licenseaccess.edit', compact('customer', 'licenseaccess'));
    }

    public function update(Customer $customer, LicenseAccess $licenseaccess, LicenseAccessRequest $request)
    {
        $this->authorize('update', LicenseAccess::class);

        $licenseaccess->update($request->validated());

        return redirect(route('licenseaccess.index', $customer));
    }

    public function destroy(Customer $customer, LicenseAccess $licenseaccess)
    {
        $this->authorize('delete', LicenseAccess::class);

        $licenseaccess->delete();

        return redirect(route('licenseaccess.index', $customer));
    }
}
