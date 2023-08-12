<?php

namespace App\Http\Controllers;

use App\Http\Requests\CameraRequest;
use App\Models\Camera;
use App\Models\Customer;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function index(Customer $customer)
    {
        $cameras = $this->getFilteredQuery(Camera::class, $customer)
                        ->get();

        return view('camera.index', compact('customer', 'cameras'));
    }

    public function create(Customer $customer)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('camera.create', compact('customer', 'sites'));
    }

    public function store(Customer $customer, CameraRequest $request)
    {
        $customer->cameras()->create($request->validated());

        return redirect(route('camera.index', $customer))->withSuccess('Gespeichert!');
    }

    public function edit(Customer $customer, Camera $camera)
    {
        $sites = $this->getSitesForCustomer($customer);

        return view('camera.edit', compact('customer', 'camera', 'sites'));
    }

    public function update(Customer $customer, Camera $camera, CameraRequest $request)
    {
        $camera->update($request->validated());

        return redirect(route('camera.index', $customer))->withSuccess('Gespeichert!');
    }

    public function destroy(Customer $customer, Camera $camera)
    {
        $camera->delete();

        return redirect(route('camera.index', $customer))->withSuccess('Gelöscht!');
    }
}
