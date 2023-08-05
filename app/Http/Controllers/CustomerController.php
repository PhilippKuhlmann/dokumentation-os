<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function __construct(Customer $customer)
    {
        $this->middleware(['auth', 'isCustomerRW', 'isCustomerR']);
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

        return view('customer.dashboard', [
            'customer' => $customer,
        ]);
    }

    public function viewPDF(Customer $customer)
    {
        $pdf = Pdf::loadView('pdf.customer', [
            'customer' => $customer,
        ]);
        return $pdf->stream();
    }




    // ADMIN Bereich
    public function index()
    {
        $customers = Customer::paginate(20);

        return view('admin.customer.index', compact('customers'));
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
}
