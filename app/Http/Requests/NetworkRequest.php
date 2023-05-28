<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NetworkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'vlanId' => 'integer|min:1|max:4094',
            'description' => 'required',
            'network' => 'required|ipv4',
            'subnetmask' => 'required|ipv4',
            'cidr' => 'integer|min:0|max:32',
            'gateway' => 'nullable|ipv4',
            'dns1' => 'nullable|ipv4',
            'dns2' => 'nullable|ipv4',
            'dhcpStart' => 'nullable|integer|min:1|max:255',
            'dhcpEnd' => 'nullable|integer|min:1|max:255',
        ];
    }
}
