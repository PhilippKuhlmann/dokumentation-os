<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouterRequest;
use App\Models\Customer;
use App\Models\Router;
use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function index(Customer $customer)
    {
        $routers = $this->getFilteredQuery(Router::class, $customer)
                        ->get();

        return view('router.index', compact('customer', 'routers'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('router.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, RouterRequest $request)
    {
        $customer->routers()->create($request->validated());

        return redirect(route('router.index', $customer));
    }

    public function edit(Customer $customer, Router $router)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('router.edit', compact('customer', 'router', 'sites'));
    }

    public function update(Customer $customer, Router $router, RouterRequest $request)
    {
        $router->update($request->validated());

        return redirect(route('router.index', $customer));
    }

    public function destroy(Customer $customer, Router $router)
    {
        $router->delete();

        return redirect(route('router.index', $customer));
    }
}
