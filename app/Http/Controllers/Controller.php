<?php

namespace App\Http\Controllers;

use App\Models\Network;
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
        $site = session()->get('site');

        // Standortfilter nur anwenden, wenn ein Standort gewählt ist UND dieser zum
        // aktuellen Kunden gehört. Sonst (nicht gesetzt / "all" / fremder Standort aus
        // einem vorherigen Kunden) alle Datensätze des Kunden zurückgeben.
        if ($site && $site !== 'all' && $customer->sites()->whereKey($site)->exists()) {
            return $model::where('customer_id', $customer->id)->where('site_id', $site);
        }

        return $model::where('customer_id', $customer->id);
    }

    protected function getSitesForCustomer($customer)
    {
        return Site::where('customer_id', $customer->id)->get();
    }

    protected function getNetworksForCustomer($customer)
    {
        return Network::where('customer_id', $customer->id)->get();
    }


}
