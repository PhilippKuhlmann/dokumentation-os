<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use App\Models\Customer;

class CertificateController extends Controller
{
    public function index(Customer $customer)
    {
        $this->authorize('viewAny', Certificate::class);
        $certificates = Certificate::where('customer_id', $customer->id)->orderBy('expiry_date')->paginate(25);

        return view('certificate.index', compact('customer', 'certificates'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', Certificate::class);

        return view('certificate.create', compact('customer'));
    }

    public function store(Customer $customer, CertificateRequest $request)
    {
        $this->authorize('create', Certificate::class);
        $customer->certificates()->create($request->validated());

        return redirect(route('certificate.index', $customer));
    }

    public function edit(Customer $customer, Certificate $certificate)
    {
        $this->authorize('update', Certificate::class);

        return view('certificate.edit', compact('customer', 'certificate'));
    }

    public function update(Customer $customer, Certificate $certificate, CertificateRequest $request)
    {
        $this->authorize('update', Certificate::class);
        $certificate->update($request->validated());

        return redirect(route('certificate.index', $customer));
    }

    public function destroy(Customer $customer, Certificate $certificate)
    {
        $this->authorize('delete', Certificate::class);
        $certificate->delete();

        return redirect(route('certificate.index', $customer));
    }
}
