<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
// use function Spatie\LaravelPdf\Support\pdf;
use App\Http\Requests\CustomerRequest;
use App\Models\ContactPerson;
use App\Models\Role;
use App\Models\Site;

class CustomerController extends Controller
{
    public function __construct(Customer $customer)
    {
        $this->middleware(['auth', 'isCustomer']);
    }

    public function search()
    {

        if (auth()->user()->role_id === Role::IS_ADMIN) {
            return redirect('/admin');
        }

        session()->put('site', 'all');

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

        return $pdf->stream();


        // return pdf()
        //     ->view('pdf.customer', compact('customer'))
        //     ->footerView('pdf.footer')
        //     ->name('dokumentation.pdf');
    }




    // ADMIN Bereich
    public function index()
    {
        $customers = Customer::paginate(20);
        $customersCount = Customer::all()->count();

        return view('admin.customer.index', compact('customers', 'customersCount'));
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
