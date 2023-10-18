<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\CustomerRequest;
use App\Models\ContactPerson;
use App\Models\Site;

class CustomerController extends Controller
{
    public function __construct(Customer $customer)
    {
        $this->middleware(['auth', 'isCustomerRW', 'isCustomerR', 'isCustomer']);
    }

    public function search()
    {
        session()->put('site', 'all');

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

    public function dashboard(Customer $customer)
    {
        $sites = Site::where('customer_id', $customer->id)->get();
        $contactpersons = ContactPerson::where('customer_id', $customer->id)->get();

        return view('customer.dashboard', compact('customer', 'sites', 'contactpersons'));
    }

    public function viewPDF(Customer $customer)
    {
        $pdf = Pdf::loadView('pdf.customer', [
            'customer' => $customer,
        ],);

        //return view('pdf.customer', compact('customer'));

        return $pdf->stream();
    }




    // ADMIN Bereich
    public function index()
    {
        $customers = Customer::paginate(20);
        $customersCount = Customer::all()->count();
        $customerLastAdded = Customer::latest('created_at')->first();

        return view('admin.customer.index', compact('customers', 'customersCount', 'customerLastAdded'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(CustomerRequest $request)
    {
        Customer::create($request->validated());

        return redirect(route('admin.customer.index'));
    }

    public function edit($customer)
    {
        $customer = Customer::where('id', $customer)->firstOrFail();
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Customer $customer, CustomerRequest $request)
    {
        $customer->update($request->validated());

        return redirect(route('admin.customer.index', $customer));
    }
}
