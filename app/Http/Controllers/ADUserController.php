<?php

namespace App\Http\Controllers;

use App\Http\Requests\ADUserRequest;
use App\Models\Customer;
use App\Models\ADUser;

class ADUserController extends Controller
{

    public function index(Customer $customer)
    {
        return view('aduser.index', compact('customer'));
    }

    public function create(Customer $customer)
    {
        return view('aduser.create', compact('customer'));
    }

    public function store(Customer $customer, ADUserRequest $request)
    {
        $customer->adusers()->create($request->validated());

        return redirect(route('aduser.index', $customer));
    }

    public function edit(Customer $customer, ADUser $aduser)
    {
        return view('aduser.edit', compact('customer', 'aduser'));
    }

    public function update(Customer $customer, ADUser $aduser, ADUserRequest $request)
    {
        $aduser->update($request->validated());

        return redirect(route('aduser.index', $customer));
    }

    public function destroy(Customer $customer, ADUser $aduser)
    {
        $aduser->delete();

        return redirect(route('aduser.index', $customer));
    }
}
