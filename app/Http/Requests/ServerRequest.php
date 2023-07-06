<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerRequest extends FormRequest
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
            'name' => 'max:255',
            'type' => 'max:255',
            'manufacturer' => 'max:255',
            'model' => 'max:255',
            'serialNumber' => 'max:255',
            'ip1' => 'max:255',
            'ip2' => 'max:255',
            'dns2' => 'max:255',
            'bmcIp' => 'max:255',
            'bmcUser' => 'max:255',
            'bmcPassword' => 'max:255',
            'services' => 'max:255',
            'operating_system_id' => '',
            'remoteID' => '',
            'remotePassword' => '',
        ];
    }
}
