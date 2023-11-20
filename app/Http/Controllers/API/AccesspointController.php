<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccesspointRequest;
use App\Models\Accesspoint;
use App\Models\Customer;
use Illuminate\Http\Request;

class AccesspointController extends Controller
{
    public function index(Request $request)
    {
        $customerId = $request->query('customer');
        $siteId = $request->query('site');
        $roomId = $request->query('room');

        $accesspoints = Accesspoint::where('customer_id', $customerId)
                            ->where('site_id', $siteId)
                            ->where('room_id', $roomId)
                            ->get();

        return response()->json($accesspoints, 200);
    }




    public function show(Customer $customer, Accesspoint $accesspoint)
    {
        return $accesspoint;
    }

    public function store(Customer $customer, AccesspointRequest $request)
    {
        $accesspoint = $customer->accesspoints()->create($request->all());

        return response()->json($accesspoint, 201);
    }

    public function update(Customer $customer, AccesspointRequest $request, Accesspoint $accesspoint)
    {
        $accesspoint->update($request->all());

        return response()->json($accesspoint, 200);
    }

    public function delete(Customer $customer, Accesspoint $accesspoint)
    {
        $accesspoint->delete();

        return response()->json(null, 204);
    }
}
