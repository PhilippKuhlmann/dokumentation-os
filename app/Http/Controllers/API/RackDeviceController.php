<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RackDevice;
use Illuminate\Http\Request;

class RackDeviceController extends Controller
{
    public function getAll()
    {
        $data = RackDevice::all();

        return response()->json($data);
    }
}
