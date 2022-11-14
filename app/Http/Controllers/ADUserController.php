<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\ADUser;

class ADUserController extends Controller
{

    public function index(Customer $customer)
    {
        return view('aduser.index', [
            'customer' => $customer,
        ]);
    }

    public function create(Customer $customer)
    {
        return view('aduser.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, Request $request)
    {

        $validated = $request->validate([
            'firstName' => [],
            'lastName' => [],
            'username' => [],
            'password' => [],
        ]);


        $customer->adusers()->create($validated);

        return redirect('/' . $customer->slug . '/aduser');
    }

    public function edit(Customer $customer, ADUser $aduser)
    {
        return view('aduser.edit', [
            'customer' => $customer,
            'aduser' => $aduser,
        ]);
    }

    public function update(Customer $customer, ADUser $aduser, Request $request)
    {
        $validated = $request->validate([
            'firstName' => [],
            'lastName' => [],
            'username' => [],
            'password' => [],
        ]);

        $aduser->update($validated);

        return redirect('/' . $customer->slug . '/aduser' . '/');
    }

    public function destroy(Customer $customer, ADUser $aduser)
    {
        $aduser->delete();

        return redirect('/' . $customer->slug . '/aduser');
    }
}
