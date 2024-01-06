<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RackCabinetRequest;
use App\Models\Customer;
use App\Models\RackCabinet;
use App\Models\RackDevice;
use App\Models\Room;
use App\Models\Site;
use Illuminate\Http\Request;

class RackCabinetController extends Controller
{
    public function index(Customer $customer, Request $request)
    {
        $rackcabinets = $customer->rackcabinets();

        $filters = ['room_id', 'site_id'];

        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                $value = $request->input($filter);
                $rackcabinets->where($filter, $value);
            }
        }

        $rackcabinets = $rackcabinets->get();

        return response()->json($rackcabinets, 200);
    }

    public function store(Customer $customer, Site $site, Room $room, RackCabinetRequest $request)
    {
        $rackcabinets = $customer->rackcabinets()->create($request->validated());

        return response()->json($rackcabinets, 201);
    }



    public function getRackCabinetDevices(Request $request)
    {
        $rackcabinetId = $request->query('rackcabinet');

        $rackcabinet = RackCabinet::where('id', $rackcabinetId)->first();

        $data = $rackcabinet->devices;

        return response()->json($data);
    }


    public function update(Request $request)
    {
        $rackcabinetId = $request->query('rackcabinet');
        $position = $request->query('position');
        $newdevice = $request->query('newdevice');


        $rackcabinet = RackCabinet::find($rackcabinetId);

        $currentRackDeviceId = $rackcabinet->devices()->wherePivot('position', $position)->first()->pivot->rack_device_id;

        $rackcabinet->devices()
                    ->wherePivot('position', $position)
                    ->updateExistingPivot($currentRackDeviceId, ['rack_device_id' => $newdevice]);

        $data = $rackcabinet->devices;

        return response()->json($data);


    }

    public function addPosition(Request $request)
    {
        $rackcabinetId = $request->query('rackcabinet');

        $maxPosition = RackCabinet::find($rackcabinetId)
                                    ->devices()
                                    ->max('rack_cabinet_rack_device.position');

        $newPosition = $maxPosition + 1;

        $rackDevice = RackDevice::find(1);

        $rackcabinet = RackCabinet::find($rackcabinetId);
        $rackcabinet->devices()->attach($rackDevice, ['position' => $newPosition]);

        $data = $rackcabinet->devices;

        return response()->json($data);
    }

    public function deletePosition(Request $request)
    {
        $rackcabinetId = $request->query('rackcabinet');
        $position = $request->query('position');

        $rackcabinet = RackCabinet::find($rackcabinetId);

        $rackcabinet->devices()->wherePivot('position', $position)->detach();

        $data = $rackcabinet->devices;

        return response()->json($data);
    }
}
