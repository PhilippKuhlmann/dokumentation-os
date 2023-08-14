<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPersonRequest;
use App\Models\ContactPerson;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContactPersonController extends Controller
{
    public function index(Customer $customer)
    {
        $contactpersons = ContactPerson::where('customer_id', $customer->id)->get();

        return view('contactperson.index', compact('customer', 'contactpersons'));
    }

    public function create(Customer $customer)
    {
        return view('contactperson.create', compact('customer'));
    }

    public function store(Customer $customer, ContactPersonRequest $request)
    {
        $customer->contactpersons()->create($request->validated());

        return redirect(route('contactperson.index', $customer));
    }

    public function edit(Customer $customer, ContactPerson $contactperson)
    {
        return view('contactperson.edit', compact('customer', 'contactperson'));
    }

    public function update(Customer $customer, ContactPerson $contactperson, ContactPersonRequest $request)
    {
        $contactperson->update($request->validated());

        return redirect(route('contactperson.index', $customer));
    }

    public function destroy(Customer $customer, ContactPerson $contactperson)
    {
        $contactperson->delete();

        return redirect(route('contactperson.index', $customer));
    }
}
