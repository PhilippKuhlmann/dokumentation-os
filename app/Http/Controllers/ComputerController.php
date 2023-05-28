<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerRequest;
use App\Models\Computer;
use App\Models\Customer;
use App\Models\OperatingSystem;

class ComputerController extends Controller
{
    public function index(Customer $customer)
    {
        return view('computer.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        return view('computer.create', [
            'customer' => $customer,
            'operatingSystems' => OperatingSystem::all(),
        ]);
    }

    public function store(Customer $customer, ComputerRequest $request)
    {
        $customer->computers()->create($request->validated());

        return redirect(route('computer.index', $customer));
    }

    public function edit(Customer $customer, Computer $computer)
    {
        return view('computer.edit', [
            'customer' => $customer,
            'computer' => $computer,
            'operatingSystems' => OperatingSystem::all(),
        ]);
    }

    public function update(Customer $customer, Computer $computer, ComputerRequest $request)
    {
        $computer->update($request->validated());

        return redirect(route('computer.index', $customer));
    }

    public function destroy(Customer $customer, Computer $computer)
    {
        $computer->delete();

        return redirect(route('computer.index', $customer));
    }
}
