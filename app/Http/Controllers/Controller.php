<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getFilteredQuery($model, $customer)
    {
        if (session()->get('site') == "all") {
            return $model::where('customer_id', $customer->id);
        } else {
            return $model::where('customer_id', $customer->id)->where('site_id', session()->get('site'));
        }
    }

    protected function getSitesForCustomer($customer)
    {
        return Site::where('customer_id', $customer->id)->get();
    }

}
