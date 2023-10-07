<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Customer;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function filter(Customer $customer, Request $request)
    {

        session()->put('site', $request->site);

        return back();
    }

    public function index(Customer $customer)
    {
        $this->authorize('viewAny', Site::class);

        $sites = $this->getSitesForCustomer($customer);

        return view('site.index', compact('customer', 'sites'));
    }

    public function create(Customer $customer)
    {
        $this->authorize('create', Site::class);

        return view('site.create', compact('customer'));
    }

    public function store(Customer $customer, SiteRequest $request)
    {
        $this->authorize('create', Site::class);

        $customer->sites()->create($request->validated());

        return redirect(route('site.index', $customer));
    }

    public function edit(Customer $customer, Site $site)
    {
        $this->authorize('update', Site::class);

        return view('site.edit', compact('customer', 'site'));
    }

    public function update(Customer $customer, Site $site, SiteRequest $request)
    {
        $this->authorize('update', Site::class);

        $site->update($request->validated());

        return redirect(route('site.index', $customer));
    }

    public function destroy(Customer $customer, Site $site)
    {
        $this->authorize('delete', Site::class);

        $site->delete();

        return redirect(route('site.index', $customer));
    }
}
