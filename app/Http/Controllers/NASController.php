<?php

namespace App\Http\Controllers;

use App\Http\Requests\NASRequest;
use App\Models\Customer;
use App\Models\NAS;
use Illuminate\Http\Request;

class NASController extends Controller
{
    public function index(Customer $customer)
    {
        return view('nas.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        return view('nas.create', compact('customer'));
    }

    public function store(Customer $customer, NASRequest $request)
    {
        $customer->nas()->create($request->validated());

        return redirect(route('nas.index', $customer));
    }

    public function edit(Customer $customer, NAS $nas)
    {
        return view('nas.edit', compact('customer', 'nas'));
    }

    public function update(Customer $customer, NAS $nas, NASRequest $request)
    {
        $nas->update($request->validated());

        return redirect(route('nas.index', $customer));
    }

    public function destroy(Customer $customer, NAS $nas)
    {
        $nas->delete();

        return redirect(route('nas.index', $customer));
    }
}
