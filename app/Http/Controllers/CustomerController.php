<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function __construct(Customer $customer)
    {
        $this->middleware(['auth', 'isCustomer']);
    }

    public function search()
    {

        if (auth()->user()->role->id == 99)
        {
            return redirect('/' . auth()->user()->customer_id);
        }

        if (auth()->user()->role->id == 1)
        {
            return redirect('/admin');
        }

        $customers = NULL;

        if (request('search')) {
            $customers = Customer::where('name', 'like', '%' . request('search') . '%')->get();
            if ($customers->isempty())
            {
                $customers = NULL;
            }
        }

        return view('customer.search', [
            'customers' => $customers,
        ]);
    }

    public function index(Customer $customer)
    {

        return view('customer.index', [
            'customer' => $customer,
        ]);
    }

    public function router(Customer $customer)
    {
        return view('customer.router', [
            'customer' => $customer,
        ]);
    }

    public function server(Customer $customer)
    {
        return view('customer.server', [
            'customer' => $customer,
        ]);
    }
}
