<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function customerRooms(Request $request)
    {
        $site = $request->query('site');

        $data = Room::where('site_id', $site)->get();

        return response()->json($data);
    }

    public function store(RoomRequest $request)
    {
        $room = Room::create($request->all());

        return response()->json($room, 201);
    }

    public function show(Room $room, Request $request)
    {
        return response()->json($room);
    }
}
