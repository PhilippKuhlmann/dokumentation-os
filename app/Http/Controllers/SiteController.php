<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function filter(Customer $customer, Request $request)
    {
        session()->put('site', $request->site);

        return back();
    }
}
