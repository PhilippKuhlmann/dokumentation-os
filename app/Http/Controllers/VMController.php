<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\ServerOperatingSystem;
use App\Models\VM;
use Illuminate\Support\Arr;

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

    public function store(Customer $customer, Request $request)
    {

        $request = Arr::set($request, 'services', explode(',', $request->services));

        $validated = $request->validate([
            'name' => [],
            'ip1' => [],
            'ip2' => [],
            'services.*' => [],
            'server_operating_system_id' => []
        ]);


        $customer->vms()->create($validated);

        return redirect('/' . $customer->slug . '/vm');
    }

    public function edit(Customer $customer, VM $vm)
    {
        return view('vm.edit', [
            'customer' => $customer,
            'vm' => $vm,
            'serverOperatingSystems' => ServerOperatingSystem::all(),
        ]);
    }

    public function update(Customer $customer, VM $vm, Request $request)
    {
        $request = Arr::set($request, 'services', explode(',', $request->services));

        $validated = $request->validate([
            'name' => [],
            'ip1' => [],
            'ip2' => [],
            'services.*' => [],
            'server_operating_system_id' => []
        ]);

        $vm->update($validated);

        return redirect('/' . $customer->slug . '/vm' . '/');
    }

    public function destroy(Customer $customer, VM $vm)
    {
        $vm->delete();

        return redirect('/' . $customer->slug . '/vm');
    }
}
