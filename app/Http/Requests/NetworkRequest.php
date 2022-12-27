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
            'vlanId' => '',
            'description' => '',
            'network' => 'max:15',
            'subnetmask' => 'max:15',
            'cidr' => 'max:3',
            'gateway' => 'max:15',
            'dns1' => 'max:15',
            'dns2' => 'max:15',
            'dhcpStart' => 'max:3',
            'dhcpEnd' => 'max:3',
        ];
    }
}
