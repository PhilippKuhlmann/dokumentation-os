<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServerRequest;
use App\Models\RackCabinet;
use App\Models\RackCabinetRackDevice;
use App\Models\RackDevice;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServerController extends Controller
{
    public function index()
    {
        return Server::all();
    }

    public function show(Server $server)
    {
        return $server;
    }

    public function store(ServerRequest $request)
    {
        $server = Server::create($request->except(['rackdevice', 'rackcabinet', 'position']));

        if ($request->has('rackdevice')) {

            $rackcabinetId = $request['rackcabinet'];
            $rackdeviceId = $request['rackdevice'];
            $position = $request['position'];

            $pivot = RackCabinetRackDevice::where('rack_cabinet_id', $rackcabinetId)
                                          ->where('rack_device_id', $rackdeviceId)
                                          ->where('position', $position)
                                          ->first();

            $pivot->filled_id = $server->id;
            $pivot->save();

        }

        return response()->json($server, 201);
    }

    public function update(ServerRequest $request, Server $server)
    {
        $server->update($request->all());

        return response()->json($server, 200);
    }

    public function delete(Server $server)
    {
        $server->delete();

        return response()->json(null, 204);
    }
}
