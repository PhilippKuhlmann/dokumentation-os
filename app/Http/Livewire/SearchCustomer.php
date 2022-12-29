<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class SearchCustomer extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {

        $customers = NULL;

        if ($this->search) {
            $customers = Customer::where('name', 'like', '%' . $this->search . '%')->get();
            if ($customers->isempty())
            {
                $customers = NULL;
            }
        }


        return view('livewire.search-customer', [
            'customers' => $customers,
        ]);
    }
}




