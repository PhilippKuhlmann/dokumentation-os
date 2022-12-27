<?php

namespace App\Http\Controllers;

use App\Http\Requests\VMRequest;
use App\Models\Customer;
use App\Models\ServerOperatingSystem;
use App\Models\VM;

class VMController extends Controller
{

    public function index(Customer $customer)
    {
        return view('vm.index',[
            'customer' => $customer
        ]);
    }

    public function create(Customer $customer)
    {
        return view('vm.create', [
            'customer' => $customer,
            'serverOperatingSystems' => ServerOperatingSystem::all(),
        ]);
    }

    public function store(Customer $customer, VMRequest $request)
    {
        $customer->vms()->create($request->validated());

        return redirect(route('vm.index', $customer));
    }

    public function edit(Customer $customer, VM $vm)
    {
        return view('vm.edit', [
            'customer' => $customer,
            'vm' => $vm,
            'serverOperatingSystems' => ServerOperatingSystem::all(),
        ]);
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
