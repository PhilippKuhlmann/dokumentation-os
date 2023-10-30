<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function customerSites(Request $request)
    {
        $customer = $request->query('customer');

        $data = Site::where('customer_id', $customer)->get();

        return response()->json($data);
    }

    public function store(SiteRequest $request)
    {
        $site = Site::create($request->all());

        return response()->json($site, 201);
    }
}
