<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;
use App\Models\Customer;
use App\Models\ServerOperatingSystem;
use Illuminate\Support\Arr;

class ServerController extends Controller
{

    public function index(Customer $customer)
    {

        return view('server.index', [
            'customer' => $customer,
        ]);
    }

    public function show(Customer $customer, Server $server)
    {
        $server = Arr::set($server, 'services', explode(',', $server->services));

        return view('server.show',[
            'customer' => $customer,
            'server' => $server,
        ]);
    }

    public function create(Customer $customer)
    {
        return view('server.create', [
            'customer' => $customer,
            'serverOperatingSystems' => ServerOperatingSystem::all(),
        ]);
    }

    public function store(Customer $customer, Request $request)
    {

        $request = Arr::set($request, 'services', explode(',', $request->services));

        $validated = $request->validate([
            'name' => [],
            'type' => [],
            'manufacturer' => [],
            'model' => [],
            'serialNumber' => [],
            'ip1' => [],
            'ip2' => [],
            'dns2' => [],
            'bmcIp' => [],
            'bmcUser' => [],
            'bmcPassword' => [],
            'services.*' => [],
            'server_operating_system_id' => [],
        ]);


        $customer->servers()->create($validated);

        return redirect('/' . $customer->slug . '/server');
    }

    public function edit(Customer $customer, Server $server)
    {
        return view('server.edit', [
            'customer' => $customer,
            'server' => $server,
            'serverOperatingSystems' => ServerOperatingSystem::all(),
        ]);
    }

    public function update(Customer $customer, Server $server, Request $request)
    {
        $request = Arr::set($request, 'services', explode(',', $request->services));

        $validated = $request->validate([
            'name' => [],
            'type' => [],
            'manufacturer' => [],
            'model' => [],
            'serialNumber' => [],
            'ip1' => [],
            'ip2' => [],
            'dns2' => [],
            'bmcIp' => [],
            'bmcUser' => [],
            'bmcPassword' => [],
            'services.*' => [],
            'server_operating_system_id' => [],
        ]);

        $server->update($validated);

        return redirect('/' . $customer->slug . '/server' . '/');
    }

    public function destroy(Customer $customer, Server $server)
    {
        $server->delete();

        return redirect('/' . $customer->slug . '/server');
    }
}
