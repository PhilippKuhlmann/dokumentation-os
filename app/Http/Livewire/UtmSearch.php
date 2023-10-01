<?php

namespace App\Http\Livewire;

use App\Models\SecurepointUTM;
use Livewire\Component;

class UtmSearch extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search) {
            $search = $this->search;
            $utms = SecurepointUTM::whereHas('customer', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })->get();
        } else {
            $utms = SecurepointUTM::all();
        }

        return view('livewire.utm-search', [
            'utms' => $utms,
        ])
            ->layout('layouts.empty');
    }
}
