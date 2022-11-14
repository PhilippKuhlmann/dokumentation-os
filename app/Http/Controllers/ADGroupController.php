<?php

namespace App\Http\Controllers;

use App\Models\ADGroup;
use Illuminate\Http\Request;
use App\Models\Customer;

class ADGroupController extends Controller
{

    public function index(Customer $customer)
    {
        return view('adgroup.index', [
            'customer' => $customer
        ]);
    }

    public function create(Customer $customer)
    {
        return view('adgroup.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, Request $request)
    {

        $validated = $request->validate([
            'name' => [],
            'description' => [],
        ]);


        $customer->adgroups()->create($validated);

        return redirect('/' . $customer->slug . '/adgroup');
    }

    public function edit(Customer $customer, ADGroup $adgroup)
    {
        return view('adgroup.edit', [
            'customer' => $customer,
            'adgroup' => $adgroup,
        ]);
    }

    public function update(Customer $customer, ADGroup $adgroup, Request $request)
    {
        $validated = $request->validate([
            'name' => [],
            'description' => [],
        ]);

        $adgroup->update($validated);

        return redirect('/' . $customer->slug . '/adgroup' . '/');
    }

    public function destroy(Customer $customer, ADGroup $adgroup)
    {
        $adgroup->delete();

        return redirect('/' . $customer->slug . '/adgroup');
    }
}
