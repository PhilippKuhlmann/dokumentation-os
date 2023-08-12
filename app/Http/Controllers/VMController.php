<?php

namespace App\Http\Controllers;

use App\Http\Requests\VMRequest;
use App\Models\Customer;
use App\Models\OperatingSystem;
use App\Models\VM;

class VMController extends Controller
{

    public function index(Customer $customer)
    {
        $vms = $this->getFilteredQuery(VM::class, $customer)
                    ->with('operatingSystem')
                    ->get();

        return view('vm.index', compact('customer', 'vms'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);
        $operatingSystems = OperatingSystem::all();

        return view('vm.create', compact('customer', 'sites', 'operatingSystem'));
    }

    public function store(Customer $customer, VMRequest $request)
    {
        $customer->vms()->create($request->validated());

        return redirect(route('vm.index', $customer));
    }

    public function edit(Customer $customer, VM $vm)
    {
        $sites = $this->getSitesForCustomer($customer);
        $operatingSystems = OperatingSystem::all();

        return view('vm.edit', compact('customer', 'sites', 'operatingSystem', 'vm'));
    }

    public function update(Customer $customer, VM $vm, VMRequest $request)
    {
        $vm->update($request->validated());

        return redirect(route('vm.index', $customer));
    }

    public function destroy(Customer $customer, VM $vm)
    {
        $vm->delete();

        return redirect(route('vm.index', $customer));
    }
}
