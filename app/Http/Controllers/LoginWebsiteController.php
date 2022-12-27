<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginWebsiteRequest;
use App\Models\Customer;
use App\Models\LoginWebsite;

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

    public function store(Customer $customer, LoginWebsiteRequest $request)
    {
        $customer->loginwebsites()->create($request->validated());

        return redirect(route('loginwebsite.index', $customer));
    }

    public function edit(Customer $customer, LoginWebsite $loginwebsite)
    {
        return view('loginwebsite.edit', [
            'customer' => $customer,
            'loginwebsite' => $loginwebsite,
        ]);
    }

    public function update(Customer $customer, LoginWebsite $loginwebsite, LoginWebsiteRequest $request)
    {
        $loginwebsite->update($request->validated());

        return redirect(route('loginwebsite.index', $customer));
    }

    public function destroy(Customer $customer, LoginWebsite $loginwebsite)
    {
        $loginwebsite->delete();

        return redirect(route('loginwebsite.index', $customer));
    }
}
