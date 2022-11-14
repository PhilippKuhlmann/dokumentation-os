<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\LoginWebsite;
use Illuminate\Http\Request;

class LoginWebsiteController extends Controller
{

    public function index(Customer $customer)
    {
        return view('loginwebsite.index', [
            'customer' => $customer,
            'loginwebsitesArray' => $customer->loginwebsites()->get()->toArray(),
        ]);
    }

    public function create(Customer $customer)
    {
        return view('loginwebsite.create', [
            'customer' => $customer,
        ]);
    }

    public function store(Customer $customer, Request $request)
    {

        $validated = $request->validate([
            'name' => [],
            'username' => [],
            'password' => [],
            'url' => [],
        ]);


        $customer->loginwebsites()->create($validated);

        return redirect('/' . $customer->slug . '/loginwebsite');
    }

    public function edit(Customer $customer, LoginWebsite $loginwebsite)
    {
        return view('loginwebsite.edit', [
            'customer' => $customer,
            'loginwebsite' => $loginwebsite,
        ]);
    }

    public function update(Customer $customer, LoginWebsite $loginwebsite, Request $request)
    {

        $validated = $request->validate([
            'name' => [],
            'username' => [],
            'password' => [],
            'url' => [],
        ]);


        $loginwebsite->update($validated);

        return redirect('/' . $customer->slug . '/loginwebsite' . '/');
    }

    public function destroy(Customer $customer, LoginWebsite $loginwebsite)
    {
        $loginwebsite->delete();

        return redirect('/' . $customer->slug . '/loginwebsite');
    }
}
