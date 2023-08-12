<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrinterRequest;
use App\Models\Customer;
use App\Models\Printer;

class PrinterController extends Controller
{
    public function index(Customer $customer)
    {
        $printers = $this->getFilteredQuery(Printer::class, $customer)
                         ->get();

        return view('printer.index', compact('customer', 'printers'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('printer.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, PrinterRequest $request)
    {
        $customer->printers()->create($request->validated());

        return redirect(route('printer.index', $customer));
    }

    public function edit(Customer $customer, Printer $printer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('printer.edit', compact('customer', 'printer', 'sites'));
    }

    public function update(Customer $customer, Printer $printer, PrinterRequest $request)
    {
        $printer->update($request->validated());

        return redirect(route('printer.index', $customer));
    }

    public function destroy(Customer $customer, Printer $printer)
    {
        $printer->delete();

        return redirect(route('printer.index', $customer));
    }
}
