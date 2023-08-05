<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerRequest;
use App\Models\Computer;
use App\Models\Customer;
use App\Models\OperatingSystem;
use App\Models\Site;

class ComputerController extends Controller
{
    public function index(Customer $customer)
    {
        if (session()->get('site') == "all") {
            $computers = Computer::where('customer_id', $customer->id)->get();

        } else {
            $computers = Computer::where('customer_id', $customer->id)->where('site_id', session()->get('site'))->get();
        }

        return view('computer.index', compact('customer', 'computers'));
    }

    public function create(Customer $customer)
    {
        $operatingSystems = OperatingSystem::all();
        $sites = Site::where('customer_id', $customer->id)->get();

        return view('computer.create', compact('customer', 'sites', 'operatingSystems'));
    }

    public function store(Customer $customer, ComputerRequest $request)
    {
        $customer->computers()->create($request->validated());

        return redirect(route('computer.index', $customer));
    }

    public function edit(Customer $customer, Computer $computer)
    {
        $operatingSystems = OperatingSystem::all();
        $sites = Site::where('customer_id', $customer->id)->get();

        return view('computer.edit', compact('customer', 'sites', 'computer', 'operatingSystems'));
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
