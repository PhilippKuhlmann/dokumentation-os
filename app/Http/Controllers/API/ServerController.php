<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServerRequest;
use App\Models\Server;
use Illuminate\Http\Request;

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
        $server = Server::create($request->all());

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
