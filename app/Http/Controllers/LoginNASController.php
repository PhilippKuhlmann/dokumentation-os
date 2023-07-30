<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginNASRequest;
use App\Models\Customer;
use App\Models\LoginNAS;
use App\Models\NAS;
use Illuminate\Http\Request;

class LoginNASController extends Controller
{
    public function index(Customer $customer)
    {
        return view('loginnas.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        $nas = NAS::where('customer_id', $customer->id)->get();

        return view('loginnas.create', compact('customer', 'nas'));
    }

    public function store(Customer $customer, LoginNASRequest $request)
    {
        $customer->loginnas()->create($request->validated());

        return redirect(route('loginnas.index', $customer));
    }

    public function edit(Customer $customer, LoginNAS $loginnas)
    {
        $nas = NAS::where('customer_id', $customer->id)->get();

        return view('loginnas.edit', compact('customer', 'loginnas', 'nas'));
    }

    public function update(Customer $customer, LoginNAS $loginnas, LoginNASRequest $request)
    {
        $loginnas->update($request->validated());

        return redirect(route('loginnas.index', $customer));
    }

    public function destroy(Customer $customer, LoginNAS $loginnas)
    {
        $loginnas->delete();

        return redirect(route('loginnas.index', $customer));
    }
}
