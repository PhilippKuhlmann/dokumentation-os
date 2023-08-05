<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServerRequest;
use App\Models\Server;
use App\Models\Customer;
use App\Models\OperatingSystem;
use Illuminate\Support\Arr;

class ServerController extends Controller
{

    public function index(Customer $customer)
    {
        $servers = Server::where('customer_id', $customer->id)->with('operatingSystem')->get();

        return view('server.index', compact('customer', 'servers'));
    }

    public function create(Customer $customer)
    {
        return view('server.create', [
            'customer' => $customer,
            'operatingSystems' => OperatingSystem::all(),
        ]);
    }

    public function store(Customer $customer, ServerRequest $request)
    {
        $customer->servers()->create($request->validated());

        return redirect(route('server.index', $customer));
    }

    public function edit(Customer $customer, Server $server)
    {
        return view('server.edit', [
            'customer' => $customer,
            'server' => $server,
            'operatingSystems' => OperatingSystem::all(),
        ]);
    }

    public function update(Customer $customer, Server $server, ServerRequest $request)
    {
        $server->update($request->validated());

        return redirect(route('server.index', $customer));
    }

    public function destroy(Customer $customer, Server $server)
    {
        $server->delete();

        return redirect(route('server.index', $customer));
    }
}
