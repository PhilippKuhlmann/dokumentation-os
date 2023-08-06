<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginGeneralRequest;
use App\Models\Customer;
use App\Models\LoginGeneral;
use Illuminate\Http\Request;

class LoginGeneralController extends Controller
{
    public function index(Customer $customer)
    {
        return view('logingeneral.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        return view('logingeneral.create', compact('customer'));
    }

    public function store(Customer $customer, LoginGeneralRequest $request)
    {
        $customer->logingenerals()->create($request->validated());

        return redirect(route('logingeneral.index', $customer));
    }

    public function edit(Customer $customer, LoginGeneral $logingeneral)
    {
        return view('logingeneral.edit', compact('customer', 'logingeneral'));
    }

    public function update(Customer $customer, LoginGeneral $logingeneral, LoginGeneralRequest $request)
    {
        $logingeneral->update($request->validated());

        return redirect(route('logingeneral.index', $customer));
    }

    public function destroy(Customer $customer, LoginGeneral $logingeneral)
    {
        $logingeneral->delete();

        return redirect(route('logingeneral.index', $customer));
    }
}
